<template>
    <DashboardLayout title="Product Reviews">
        <template #content>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3 mb-md-4">
                                <div class="col-md-12 align-items-center">
                                    <h3 class="mb-0">Product Reviews: <small class="text-primary">{{ props.product.name
                                            }}</small></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-xl-2 col-sm-6 mb-3">
                                            <label class="form-label mb-0">Ratings</label>
                                            <Multiselect v-model="ratingFilter" :options="ratings" :showLabels="false"
                                                :close-on-select="true" :clear-on-select="false" :searchable="true"
                                                label="name" track-by="id" placeholder="Search by rating" />
                                        </div>
                                        <div class="col-xl-1 col-sm-6 align-self-end mb-3">
                                            <button @click="clearFilters"
                                                class="btn btn-primary px-2 py-2 light d-flex align-items-center"
                                                title="Click here to remove filter" type="button"><i
                                                    class="bi bi-arrow-clockwise fs-2"></i></button>
                                        </div>
                                        <div v-if="reviews.length > 0"
                                            class="col-lg-9 ps-0 d-flex justify-content-end align-self-end mb-3">
                                            <div>
                                                <select class="form-select form-select-solid " :value="2"
                                                    v-model="pageCount" @change="perPageChange">
                                                    <option v-for="perPageCount in perPage" :key="perPageCount"
                                                        :value="perPageCount" v-text="perPageCount" />
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive active-projects">
                                        <table id="projects-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th>REVIEWER</th>
                                                    <th>EMAIL</th>
                                                    <th>REVIEW</th>
                                                    <th>RATING</th>
                                                    <th>DATE</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="review in reviews" :key="review.id">
                                                    <td class="py-2">{{ review.name }}</td>
                                                    <td class="py-2">{{ review.email ?? '' }}</td>
                                                    <td class="py-2">{{ review.review }}</td>
                                                    <td class="py-2">
                                                        <span v-for="i in 5" :key="i">
                                                            <i :class="[
                                                                'fa-star',
                                                                'me-1',
                                                                'fa',
                                                                i <= review.rating ? 'fas text-warning' : 'far text-muted'
                                                            ]"></i>
                                                        </span>
                                                    </td>
                                                    <td class="py-2">{{ review.date }}</td>
                                                    <td class="py-2">
                                                        <div class="d-flex justify-content-end">
                                                            <button @click="confirmDelete(review.id)" class=" btn btn-danger shadow
                                                                btn-xs sharp" title="Delete Review"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr v-if="!reviews.length">
                                                    <td class="py-4 text-center text-muted" colspan="6">
                                                        <i class="bi bi-exclamation-circle me-1"></i>
                                                        No reviews found.
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div v-if="reviews.length > 0" class="row">
                                        <div class="col-md-6">
                                            <p class="text-truncate text-muted">Showing {{ pagination.from
                                                }} to
                                                {{ pagination.to }} of
                                                {{ pagination.total }} entries</p>
                                        </div>
                                        <div class="col-md-6">
                                            <nav>
                                                <ul
                                                    class="pagination pagination-sm pagination-gutter justify-content-end">
                                                    <!-- Previous -->
                                                    <li class="page-item page-indicator"
                                                        :class="{ disabled: pagination.current_page === 1 }">
                                                        <a class="page-link" href="#"
                                                            @click.prevent="setPage(pagination.current_page - 1)">
                                                            <i class="la la-angle-left"></i>
                                                        </a>
                                                    </li>

                                                    <!-- Page Numbers -->
                                                    <template v-for="(page, index) in pagination.last_page"
                                                        :key="index">
                                                        <template
                                                            v-if="page === 1 || page === pagination.last_page || Math.abs(page - pagination.current_page) < 5">
                                                            <li class="page-item"
                                                                :class="{ active: pagination.current_page === page }">
                                                                <a class="page-link" href="#"
                                                                    @click.prevent="setPage(page)">
                                                                    {{ page }}
                                                                </a>
                                                            </li>
                                                        </template>
                                                    </template>

                                                    <!-- Next -->
                                                    <li class="page-item page-indicator"
                                                        :class="{ disabled: pagination.current_page === pagination.last_page }">
                                                        <a class="page-link" href="#"
                                                            @click.prevent="setPage(pagination.current_page + 1)">
                                                            <i class="la la-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </template>
        <template #loader>
            <Loader ref="loading_bar" />
        </template>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, watch, nextTick } from 'vue';
import { router } from '@inertiajs/vue3';
import axios from 'axios';
import Multiselect from 'vue-multiselect';
import { ValidationMixin } from '@/plugins/mixins';
import _ from 'lodash';
import Loader from '@/Components/Basic/LoadingBar.vue';
import Swal from 'sweetalert2'

const props = defineProps({
    product: Object
});

const loading_bar = ref(null);

const page = ref(1);
const perPage = ref([25, 50, 100]);
const pageCount = ref(25);
const pagination = ref({});

const reviews = ref([]);

const ratingFilter = ref(null);

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

const ratings = ref([
    { id: '1', name: '1 Star' },
    { id: '2', name: '2 Stars' },
    { id: '3', name: '3 Stars' },
    { id: '4', name: '4 Stars' },
    { id: '5', name: '5 Stars' },
]);

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
    nextTick(() => {
        loading_bar.value.start();
    });
    const tableData = (
        await axios.get(route('products.reviews.all', props.product.id), {
            params: {
                page: page.value,
                per_page: pageCount.value,
                search_rating: ratingFilter.value ? ratingFilter.value.id : null,
            },
        })
    ).data;

    reviews.value = tableData.data;
    pagination.value = tableData.meta;

    nextTick(() => {
        loading_bar.value.finish();
    });
};

const confirmDelete = async (id) => {
    nextTick(() => {
        loading_bar.value.start();
    });

    await axios.delete(route('review.destroy', id)).then(() => {
        ValidationMixin.methods.successMessage("Review has been deleted.");
        reload();
    });

    nextTick(() => {
        loading_bar.value.finish();
    });
};

function clearFilters() {
    ratingFilter.value = null;
    reload();
}

onMounted(() => {
    reload();
});

watch(() => {
    if (ratingFilter.value) {
        reload();
    } else {
        reload();
    }
});

</script>
