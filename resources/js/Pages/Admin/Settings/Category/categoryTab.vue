<template>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 align-items-center">
                    <h4>Manage Categories</h4>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <button @click="createModal" class="btn light btn-primary"><i class="bi bi-patch-plus"></i>
                        Add New</button>
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
                <div v-if="categories.length > 0" class="col-lg-9 ps-0 d-flex justify-content-end align-self-end mb-3">
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
                        <tr v-for="category in categories" :key="category.id">
                            <td class="py-2">{{ category.name }}</td>
                            <td class="py-2">
                                <div class="d-flex justify-content-end">
                                    <button @click="editModal(category.id)" class="btn btn-primary shadow btn-xs sharp">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-info shadow btn-xs sharp ms-2"
                                        @click="openBrandTab(category)">
                                        <i class="fa fa-b"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="!categories.length">
                            <td class="py-4 text-center text-muted" colspan="2">
                                <i class="bi bi-exclamation-circle me-1"></i>
                                No categories found.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="categories.length > 0" class="row">
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

    <div class="modal fade" id="createCategoryModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="createCategory" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 form-label text-gray-600">Name</div>
                            <div class="col-12">
                                <input v-model="category.name" type="text" class="form-control form-control-sm"
                                    placeholder="Category Name" />
                                <div v-if="validationErrors.name" class="invalid-feedback">
                                    {{ validationErrors.name }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCategoryModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="updateCategory" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 form-label text-gray-600">Name</div>
                            <div class="col-12">
                                <input v-model="edit_category.name" type="text" class="form-control form-control-sm"
                                    placeholder="Category Name" />
                                <div v-if="validationErrors.name" class="invalid-feedback">
                                    {{ validationErrors.name }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
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
const emit = defineEmits(['switchToBrandTab']);

const openBrandTab = (category) => {
    emit('switchToBrandTab', category);
}

const loading_bar = ref(null);

const page = ref(1);
const perPage = ref([25, 50, 100]);
const pageCount = ref(25);
const pagination = ref({});

const categories = ref([]);
const category = ref({});
const edit_category = ref({});

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
        await axios.get(route('categories.all'), {
            params: {
                page: page.value,
                per_page: pageCount.value,
                search_name: nameFilter.value,
            },
        })
    ).data;

    categories.value = tableData.data;
    pagination.value = tableData.meta;
};

const createModal = async () => {
    try {
        resetValidationErrors();
        $('#createCategoryModal').modal('show');
    } catch (error) {
        convertValidationNotification(error);
    }
};

const createCategory = async () => {
    try {
        await axios.post(route('category.store'), category.value).then(() => {
            $('#createCategoryModal').modal('hide');
            reload();
            ValidationMixin.methods.successMessage("Category added successfully");
            resetValidationErrors();
            category.value = {};
        });

    } catch (error) {
        convertValidationError(error);
    }
};

const editModal = async (id) => {
    try {
        resetValidationErrors();
        const response = await axios.get(route('category.edit', id));
        $('#editCategoryModal').modal('show');
        edit_category.value = response.data;
    } catch (error) {
        convertValidationError(error);
    }
};

const updateCategory = async () => {
    try {
        await axios.put(
            route('category.update', edit_category.value.id),
            edit_category.value
        );

        $('#editCategoryModal').modal('hide');
        reload();
        ValidationMixin.methods.successMessage("Category updated successfully");
        resetValidationErrors();
        edit_category.value = {};


    } catch (error) {
        convertValidationError(error);
    }
};

function clearFilters() {
    nameFilter.value = '';
    reload();
}

onMounted(() => {
    reload();
});

</script>
