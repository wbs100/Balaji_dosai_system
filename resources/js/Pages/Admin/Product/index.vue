<template>
    <DashboardLayout title="Products">
        <template #content>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3 mb-md-4">
                                <div class="col-md-6 align-items-center">
                                    <h3 class="mb-0">Products</h3>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <Link :href="route('products.create')" class="btn light btn-primary"><i
                                        class="bi bi-patch-plus"></i>
                                    Add New</Link>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-xl-2 col-sm-6">
                                            <label class="form-label mb-0">SKU</label>
                                            <input type="text" v-model="skuFilter" class="form-control mb-3"
                                                placeholder="Search by SKU" @keyup="debouncedGetSearch">
                                        </div>
                                        <div class="col-xl-2 col-sm-6">
                                            <label class="form-label mb-0">NAME</label>
                                            <input type="text" v-model="nameFilter" class="form-control mb-3"
                                                placeholder="Search by name" @keyup="debouncedGetSearch">
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <label class="form-label mb-0">CATEGORY</label>
                                            <Multiselect v-model="categoryFilter" :options="categories"
                                                :showLabels="false" :close-on-select="true" :clear-on-select="false"
                                                :searchable="true" label="name" track-by="id"
                                                placeholder="Search by category" />
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
                                        <div v-if="products.length > 0"
                                            class="col-lg-2 ps-0 d-flex justify-content-end align-self-end mb-3">
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
                                                    <th>#</th>
                                                    <th>SKU</th>
                                                    <th>NAME</th>
                                                    <th>CATEGORY</th>
                                                    <th class="text-end">COST</th>
                                                    <th class="text-end">SELLING PRICE</th>
                                                    <th class="text-end">DISCOUNT</th>
                                                    <th class="text-end">STOCK</th>
                                                    <th>STATUS</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="product in products" :key="product.id">
                                                    <td class="py-2">{{ product.id }}</td>
                                                    <td class="py-2">{{ product.sku }}</td>
                                                    <td class="py-2">{{ product.name }}</td>
                                                    <td class="py-2">{{ product.category_name }}</td>
                                                    <td class="py-2 text-end">{{ product.cost_price }}</td>
                                                    <td class="py-2 text-end">{{ product.selling_price }}</td>
                                                    <td class="py-2 text-end">{{ product.product_discount }}</td>
                                                    <td class="py-2 text-end">{{ product.stock_quantity }}</td>
                                                    <td class="py-2">
                                                        <div v-if="product.status == 'active'"
                                                            class="d-flex align-items-center"><i
                                                                class="fa fa-circle text-success me-1"></i> Active
                                                        </div>
                                                        <div v-if="product.status == 'inactive'"
                                                            class="d-flex align-items-center"><i
                                                                class="fa fa-circle text-warning me-1"></i> Inactive
                                                        </div>
                                                    </td>
                                                    <td class="py-2">
                                                        <div class="d-flex justify-content-end">
                                                            <button @click="editStock(product.id)"
                                                                class="btn btn-info shadow btn-xs sharp me-1"
                                                                title="Update Stock">
                                                                <i class="fa fa-box"></i>
                                                            </button>
                                                            <button @click.prevent="changeStatus(product.id)"
                                                                class="btn shadow btn-xs sharp me-1"
                                                                :class="product.status === 'active' ? 'btn-warning' : 'btn-success'"
                                                                title="Status Change">
                                                                <i v-if="product.status == 'inactive'"
                                                                    class="fa fa-eye"></i>
                                                                <i v-else class="fa fa-eye-slash"></i>
                                                            </button>
                                                            <Link :href="route('product.edit', product.id)"
                                                                class="btn btn-primary shadow btn-xs sharp me-1"
                                                                title="Edit Product Details"><i
                                                                class="fa fa-pencil"></i></Link>
                                                            <Link :href="route('product.reviews', product.id)"
                                                                class="btn btn-secondary shadow btn-xs sharp me-1"
                                                                title="Edit Product Details"><i
                                                                class="fa fa-comments"></i></Link>
                                                            <!-- <button @click="confirmDelete(product.id)" class=" btn btn-danger shadow
                                                                btn-xs sharp" title="Delete Product"><i
                                                                    class="fa fa-trash"></i></button> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr v-if="!products.length">
                                                    <td class="py-4 text-center text-muted" colspan="8">
                                                        <i class="bi bi-exclamation-circle me-1"></i>
                                                        No products found.
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div v-if="products.length > 0" class="row">
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

            <div class="modal fade" id="stockModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Stock Update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="updateStock" enctype="multipart/form-data">
                                <div class="row mt-4">
                                    <div class="col-5 col-md-4 form-label text-gray-600">Transaction Type</div>
                                    <div class="col-7 col-md-8">
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="stockIn" value="1"
                                                        v-model="stock.transaction_type_id">
                                                    <label class="form-check-label" for="stockIn">
                                                        Stock In
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="stockOut" value="0"
                                                        v-model="stock.transaction_type_id">
                                                    <label class="form-check-label" for="stockOut">
                                                        Stock Out
                                                    </label>
                                                </div>
                                            </div>
                                            <div v-if="validationErrors.transaction_type_id" class="invalid-feedback">
                                                {{ validationErrors.transaction_type_id }}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12 form-label text-gray-600 mt-3">Quantity</div>
                                    <div class="col-12">
                                        <input v-model="stock.quantity" type="text" class="form-control form-control-sm"
                                            placeholder="Product Quantity" />
                                        <div v-if="validationErrors.quantity" class="invalid-feedback">
                                            {{ validationErrors.quantity }}
                                        </div>
                                    </div>

                                    <div class="col-12 form-label text-gray-600 mt-3">Remark</div>
                                    <div class="col-120">
                                        <textarea v-model="stock.remarks" class="form-control"
                                            placeholder="Enter Remark" data-kt-autosize="true"
                                            style="resize: none; font-size: 12px;" rows="2"></textarea>
                                        <div v-if="validationErrors.remarks" class="invalid-feedback">
                                            {{ validationErrors.remarks }}
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

const props = defineProps({
    categories: Array
})

const loading_bar = ref(null);

const page = ref(1);
const perPage = ref([25, 50, 100]);
const pageCount = ref(25);
const pagination = ref({});

const products = ref([]);

const skuFilter = ref('');
const nameFilter = ref('');
const categoryFilter = ref(null);
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
    { id: 'active', name: 'Active' },
    { id: 'inactive', name: 'Inactive' },
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
        await axios.get(route('products.all'), {
            params: {
                page: page.value,
                per_page: pageCount.value,
                search_sku: skuFilter.value,
                search_name: nameFilter.value,
                search_category: categoryFilter.value ? categoryFilter.value.id : null,
                search_status: statusFilter.value ? statusFilter.value.id : null,
            },
        })
    ).data;

    products.value = tableData.data;
    pagination.value = tableData.meta;

    nextTick(() => {
        loading_bar.value.finish();
    });
};

const changeStatus = async (productId) => {
    nextTick(() => {
        loading_bar.value.start();
    });
    try {

        await axios.get(route('product.status', productId)).then(() => {
            ValidationMixin.methods.successMessage("Status updated successfully");
            reload();
        });
        nextTick(() => {
            loading_bar.value.finish();
        });
    } catch (error) {
        nextTick(() => {
            loading_bar.value.finish();
        });
        convertValidationError(error);
    }
};

const editStock = async (id) => {
    nextTick(() => {
        loading_bar.value.start();
    });
    try {
        const response = (await axios.get(route("product.get", id))).data;
        stock.value = response;
        resetValidationErrors();
        $('#stockModal').modal('show');
        nextTick(() => {
            loading_bar.value.finish();
        });
    } catch (error) {
        nextTick(() => {
            loading_bar.value.finish();
        });
        convertValidationNotification(error);
    }
};

const updateStock = async () => {
    nextTick(() => {
        loading_bar.value.start();
    });
    try {

        const response = (await axios.post(route("stock.update", stock.value.id), stock.value)).data;
        ValidationMixin.methods.successMessage("Stock updated successfully");

        $('#stockModal').modal('hide');
        reload();

        nextTick(() => {
            loading_bar.value.finish();
        });
    } catch (error) {
        nextTick(() => {
            loading_bar.value.finish();
        });
        convertValidationError(error);
    }
};

const confirmDelete = (id) => {
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
            router.delete(route('product.destroy', id), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire(
                        'Deleted!',
                        'Product has been deleted.',
                        'success'
                    )
                },
                onError: () => {
                    Swal.fire(
                        'Error!',
                        'Something went wrong deleting the product.',
                        'error'
                    )
                }
            })
        }
    })
}

function clearFilters() {
    skuFilter.value = '';
    nameFilter.value = '';
    categoryFilter.value = null;
    statusFilter.value = null;
    reload();
}

onMounted(() => {
    reload();
});

watch(() => {
    if (categoryFilter.value) {
        reload();
    } else {
        reload();
    }

    if (statusFilter.value) {
        reload();
    } else {
        reload();
    }
});

</script>
