<template>
    <DashboardLayout title="Orders">
        <template #content>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3 mb-md-4">
                                <div class="col-md-6 align-items-center">
                                    <h3 class="mb-0">Orders</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-xl-2 col-sm-6">
                                            <label class="form-label mb-0">CODE</label>
                                            <input type="text" v-model="codeFilter" class="form-control mb-3"
                                                placeholder="Search by CODE" @keyup="debouncedGetSearch">
                                        </div>
                                        <div class="col-xl-2 col-sm-6 mb-3">
                                            <label class="form-label mb-0">STATUS</label>
                                            <Multiselect v-model="statusFilter" :options="status" :showLabels="false"
                                                :close-on-select="true" :clear-on-select="false" :searchable="true"
                                                label="name" track-by="id" placeholder="Search by status" />
                                        </div>
                                        <div class="col-xl-1 col-sm-6 align-self-end mb-3">
                                            <button @click="clearFilters"
                                                class="btn btn-primary px-2 py-2 light d-flex align-items-center"
                                                title="Click here to remove filter" type="button"><i
                                                    class="bi bi-arrow-clockwise fs-2"></i></button>
                                        </div>
                                        <div v-if="orders.length > 0"
                                            class="col-lg-7 ps-0 d-flex justify-content-end align-self-end mb-3">
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
                                                    <th>CODE</th>
                                                    <th>NAME</th>
                                                    <th>DATE</th>
                                                    <th class="text-end">TOTAL</th>
                                                    <th>STATUS</th>
                                                    <th>PAYMENT STATUS</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="order in orders" :key="order.id">
                                                    <td class="py-2">{{ order.order_code }}</td>
                                                    <td class="py-2">{{ order.customer_name }}</td>
                                                    <td class="py-2">{{ order.created_at }}</td>
                                                    <td class="py-2 text-end">{{ order.total }}</td>
                                                    <td class="py-2">
                                                        <div v-if="order.status" class="d-flex align-items-center">
                                                            <i class="fa fa-circle me-1" :class="{
                                                                'text-success': order.status === 'completed',
                                                                'text-warning': order.status === 'processing',
                                                                'text-danger': order.status === 'cancelled',
                                                                'text-secondary': order.status === 'pending'
                                                            }"></i>
                                                            <span class="text-capitalize">{{ order.status }}</span>
                                                        </div>
                                                        <div v-else class="d-flex align-items-center text-muted">
                                                            <i class="fa fa-circle text-secondary me-1"></i> Unknown
                                                        </div>
                                                    </td>
                                                    <td class="py-2">{{ order.payment_status }}</td>
                                                    <td class="py-2">
                                                        <div class="d-flex justify-content-end">
                                                            <Link :href="route('order.view', order.id)"
                                                                class="btn btn-info shadow btn-xs sharp me-1">
                                                            <i class="fa fa-eye"></i>
                                                            </Link>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr v-if="!orders.length">
                                                    <td class="py-4 text-center text-muted" colspan="6">
                                                        <i class="bi bi-exclamation-circle me-1"></i>
                                                        No orders found.
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div v-if="orders.length > 0" class="row">
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
import { Link, router } from '@inertiajs/vue3';
import axios from 'axios';
import Multiselect from 'vue-multiselect';
import _ from 'lodash';
import { ValidationMixin } from '@/plugins/mixins';
import Loader from '@/Components/Basic/LoadingBar.vue';
import Swal from 'sweetalert2'

const loading_bar = ref(null);

const page = ref(1);
const perPage = ref([25, 50, 100]);
const pageCount = ref(25);
const pagination = ref({});

const orders = ref([]);

const codeFilter = ref('');
const nameFilter = ref('');
const statusFilter = ref(null);

const stock = ref({});

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

const status = ref([
    { id: 'pending', name: 'Pending' },
    { id: 'processing', name: 'Processing' },
    { id: 'completed', name: 'Completed' },
    { id: 'cancelled', name: 'Cancelled' },
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
        await axios.get(route('orders.all'), {
            params: {
                page: page.value,
                per_page: pageCount.value,
                search_code: codeFilter.value,
                search_status: statusFilter.value ? statusFilter.value.id : null,
            },
        })
    ).data;

    orders.value = tableData.data;
    pagination.value = tableData.meta;

    nextTick(() => {
        loading_bar.value.finish();
    });
};

function clearFilters() {
    codeFilter.value = '';
    nameFilter.value = '';
    categoryFilter.value = null;
    statusFilter.value = null;
    reload();
}

onMounted(() => {
    reload();
});

watch(() => {

    if (statusFilter.value) {
        reload();
    } else {
        reload();
    }
});

</script>
