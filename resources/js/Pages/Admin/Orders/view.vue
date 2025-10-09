<template>
    <DashboardLayout title="Order Details">
        <template #content>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3 mb-md-4">
                                <div class="col-md-6 align-items-center">
                                    <h3 class="mb-0">Order Details</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <!-- Customer Info -->
                                        <h5 class="mb-3">Customer Information</h5>
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <p><strong>Name:</strong> {{ (order.first_name + ' ' + order.last_name)
                                                    ?? 'N/A' }}</p>
                                                <p><strong>Email:</strong> {{ order.email }}</p>
                                                <p><strong>Phone:</strong> {{ order.phone }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Address:</strong></p>
                                                <p class="mb-0">{{ order.address_line1 }}</p>
                                                <p class="mb-0" v-if="order.address_line2">{{ order.address_line2 }}</p>
                                                <p>{{ order.city }}, {{ order.province }}, {{ order.postal_code }}</p>
                                            </div>
                                        </div>

                                        <!-- Order Info -->
                                        <h5 class="mb-3">Order Information</h5>
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <p><strong>Order Code:</strong> {{ order.order_code }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><strong>Payment Method:</strong> {{ order.payment_method }}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <label><strong>Update Status:</strong></label>
                                                <select v-model="selectedStatus" class="form-select">
                                                    <option v-for="opt in statusOptions" :key="opt.id" :value="opt.id">
                                                        {{ opt.name }}
                                                    </option>
                                                </select>
                                                <button class="btn btn-sm btn-primary mt-2"
                                                    @click="submitStatusUpdate">Update</button>
                                            </div>
                                        </div>

                                        <!-- Order Items -->
                                        <h5 class="mb-3">Items</h5>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product</th>
                                                        <th class="text-end">Qty</th>
                                                        <th class="text-end">Unit Price (LKR)</th>
                                                        <th class="text-end">Total (LKR)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in order.items" :key="index">
                                                        <td>{{ index + 1 }}</td>
                                                        <td>{{ item.product?.name ?? 'Deleted Product' }}</td>
                                                        <td class="text-end">{{ formatNumber(item.quantity) }}</td>
                                                        <td class="text-end">LKR {{ formatCurrency(item.unit_price) }}
                                                        </td>
                                                        <td class="text-end">LKR {{ formatCurrency(item.price) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Order Total -->
                                        <div class="text-end mt-3">
                                            <h5>Total: LKR {{ formatCurrency(order.total) }}</h5>
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
import Swal from 'sweetalert2';

const props = defineProps({
    order: Object
});
// console.log('Order Object:', order.value);
const loading_bar = ref(null);

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

const formatNumber = (value) => {
    return new Intl.NumberFormat().format(value);
};

const formatCurrency = (value) => {
    return new Intl.NumberFormat('en-LK', {
        style: 'decimal',
        minimumFractionDigits: 2,
        maximumFractionDigits: 2,
    }).format(value);
};

const selectedStatus = ref(props.order.order_status);

const statusOptions = ref([
    { id: 'pending', name: 'Pending' },
    { id: 'processing', name: 'Processing' },
    { id: 'completed', name: 'Completed' },
    { id: 'cancelled', name: 'Cancelled' },
]);

const submitStatusUpdate = async () => {
    nextTick(() => {
        loading_bar.value.start();
    });
    try {
        await axios.put(route('order.updateStatus', props.order.id), { status: selectedStatus.value }).then(() => {
            ValidationMixin.methods.successMessage("Order status updated successfully");
            resetValidationErrors();
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

</script>
