<template>
    <div class="row">
        <div class="col-12">
            <button class="btn btn-secondary mb-3" @click="$emit('backToCategory')">
                ← Back to categories
            </button>
            <div class="row">
                <div class="col-md-6 col-lg-9">
                    <h4 class="mb-3">Brands for Category: <strong>{{ props.category.name }}</strong></h4>
                </div>
                <div class="col-md-6 col-lg-3">
                    <form @submit.prevent="createBrand" enctype="multipart/form-data"
                        class="d-flex align-items-end justify-content-end">
                        <div class="w-100">
                            <label class="form-label mb-0">Add Brand</label>
                            <input type="text" v-model="brand.name" class="form-control" placeholder="Enter brand name"
                                @keyup="debouncedGetSearch">
                        </div>
                        <div class=" ms-2">
                            <button class="btn btn-primary px-3 light d-flex align-items-center"
                                title="Click here to remove filter" type="submit">+</button>
                        </div>
                    </form>
                    <div v-if="validationErrors.name" class="invalid-feedback">
                        {{ validationErrors.name }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="row g-2">
                <div class="col-xl-2 col-sm-6">
                    <label class="form-label mb-0">NAME</label>
                    <input type="text" v-model="nameFilter" class="form-control mb-3" placeholder="Search by name"
                        @keyup="debouncedGetSearch">
                </div>
                <div class="col-xl-1 col-sm-6 align-self-end mb-3">
                    <button @click="clearFilters" class="btn btn-primary px-2 py-2 light d-flex align-items-center"
                        title="Click here to remove filter" type="button"><i
                            class="bi bi-arrow-clockwise fs-2"></i></button>
                </div>
                <div v-if="brands.length > 0" class="col-lg-9 ps-0 d-flex justify-content-end align-self-end mb-3">
                    <div>
                        <select class="form-select form-select-solid " :value="2" v-model="pageCount"
                            @change="perPageChange">
                            <option v-for="perPageCount in perPage" :key="perPageCount" :value="perPageCount"
                                v-text="perPageCount" />
                        </select>
                    </div>
                </div>
            </div>

            <div class="table-responsive active-projects">
                <table id="projects-tbl" class="table">
                    <thead>
                        <tr>
                            <th>NAME</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="brand in brands" :key="brand.id">
                            <td class="py-2">{{ brand.name }}</td>
                            <td class="py-2">
                                <div class="d-flex justify-content-end">
                                    <button @click="confirmDelete(brand.id, category.id)"
                                        class="btn btn-danger shadow btn-xs sharp">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="!brands.length">
                            <td class="py-4 text-center text-muted" colspan="2">
                                <i class="bi bi-exclamation-circle me-1"></i>
                                No brands found.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="brands.length > 0" class="row">
                <div class="col-md-6">
                    <p class="text-truncate text-muted">Showing {{ pagination.from
                        }} to
                        {{ pagination.to }} of
                        {{ pagination.total }} entries</p>
                </div>
                <div class="col-md-6">
                    <nav>
                        <ul class="pagination pagination-sm pagination-gutter justify-content-end">
                            <!-- Previous -->
                            <li class="page-item page-indicator" :class="{ disabled: pagination.current_page === 1 }">
                                <a class="page-link" href="#" @click.prevent="setPage(pagination.current_page - 1)">
                                    <i class="la la-angle-left"></i>
                                </a>
                            </li>

                            <!-- Page Numbers -->
                            <template v-for="(page, index) in pagination.last_page" :key="index">
                                <template
                                    v-if="page === 1 || page === pagination.last_page || Math.abs(page - pagination.current_page) < 5">
                                    <li class="page-item" :class="{ active: pagination.current_page === page }">
                                        <a class="page-link" href="#" @click.prevent="setPage(page)">
                                            {{ page }}
                                        </a>
                                    </li>
                                </template>
                            </template>

                            <!-- Next -->
                            <li class="page-item page-indicator"
                                :class="{ disabled: pagination.current_page === pagination.last_page }">
                                <a class="page-link" href="#" @click.prevent="setPage(pagination.current_page + 1)">
                                    <i class="la la-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>

</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import _ from 'lodash';
import { ValidationMixin } from '@/plugins/mixins';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    category: {
        type: Object,
        required: true,
    },
});

const page = ref(1);
const perPage = ref([25, 50, 100]);
const pageCount = ref(25);
const pagination = ref({});

const brands = ref([]);
const brand = ref({});
const edit_brand = ref({});

const nameFilter = ref('');

const validationErrors = ref({});
const validationMessage = ref(null);

const resetValidationErrors = () => {
    validationErrors.value = {};
    validationMessage.value = null;
};

const convertValidationError = (err) => {
    resetValidationErrors();
    if (!(err.response && err.response.data)) return;
    const { message, errors } = err.response.data;
    validationMessage.value = message;
    if (errors) {
        for (const error in errors) {
            validationErrors.value[error] = errors[error][0];
        }
    }
};

const setPage = (new_page) => {
    page.value = new_page;
    reload();
};

const getSearch = async () => {
    page.value = 1;
    reload();
};

const debouncedGetSearch = _.debounce(getSearch, 1000);

const perPageChange = async () => {
    page.value = 1;
    reload();
};

const reload = async () => {
    const tableData = (
        await axios.get(route('brands.all', props.category.id), {
            params: {
                page: page.value,
                per_page: pageCount.value,
                search_name: nameFilter.value,
            },
        })
    ).data;

    brands.value = tableData.data;
    pagination.value = tableData.meta;
};

const createBrand = async () => {
    try {
        await axios.post(route('brand.store', props.category.id), brand.value).then(() => {
            reload();
            ValidationMixin.methods.successMessage("Brand added successfully");
            resetValidationErrors();
            brand.value = {};
        });

    } catch (error) {
        convertValidationError(error);
    }
};

const confirmDelete = (brandId, categoryId) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(route('brand.destroy', {
                category: categoryId,
                brand: brandId
            }), {
                preserveScroll: true,
                onSuccess: () => {
                    reload();
                    Swal.fire('Deleted!', 'Brand has been detached from category.', 'success')
                },
                onError: () => {
                    Swal.fire('Error!', 'Something went wrong detaching the brand.', 'error')
                }
            })
        }
    })
}

function clearFilters() {
    nameFilter.value = '';
    reload();
}

onMounted(() => {
    reload();
});

</script>
