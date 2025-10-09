<template>
    <DashboardLayout title="Dashboard">
        <template #content>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="row">

                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card">
                                                        <div class="card-body depostit-card">
                                                            <div
                                                                class="depostit-card-media d-flex justify-content-between style-1">
                                                                <div>
                                                                    <h6>Total Pending Orders</h6>
                                                                    <h3>{{ totalPendingOrders }}</h3>
                                                                </div>
                                                                <div class="icon-box bg-secondary">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0_3_566)">
                                                                            <path opacity="0.3" fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M8 3V3.5C8 4.32843 8.67157 5 9.5 5H14.5C15.3284 5 16 4.32843 16 3.5V3H18C19.1046 3 20 3.89543 20 5V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V5C4 3.89543 4.89543 3 6 3H8Z"
                                                                                fill="#222B40" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M10.875 15.75C10.6354 15.75 10.3958 15.6542 10.2042 15.4625L8.2875 13.5458C7.90417 13.1625 7.90417 12.5875 8.2875 12.2042C8.67083 11.8208 9.29375 11.8208 9.62917 12.2042L10.875 13.45L14.0375 10.2875C14.4208 9.90417 14.9958 9.90417 15.3792 10.2875C15.7625 10.6708 15.7625 11.2458 15.3792 11.6292L11.5458 15.4625C11.3542 15.6542 11.1146 15.75 10.875 15.75Z"
                                                                                fill="#222B40" />
                                                                            <path fill-rule="evenodd"
                                                                                clip-rule="evenodd"
                                                                                d="M11 2C11 1.44772 11.4477 1 12 1C12.5523 1 13 1.44772 13 2H14.5C14.7761 2 15 2.22386 15 2.5V3.5C15 3.77614 14.7761 4 14.5 4H9.5C9.22386 4 9 3.77614 9 3.5V2.5C9 2.22386 9.22386 2 9.5 2H11Z"
                                                                                fill="#222B40" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0_3_566">
                                                                                <rect width="24" height="24"
                                                                                    fill="white" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="progress-box mt-0">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="mb-0">Complete Orders</p>
                                                                    <p class="mb-0">20/28</p>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-secondary"
                                                                        style="width:50%; height:5px; border-radius:4px;"
                                                                        role="progressbar"></div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card same-card">
                                                        <div class="card-body depostit-card p-0">
                                                            <div
                                                                class="depostit-card-media d-flex justify-content-between pb-0">
                                                                <div>
                                                                    <h6>Total Income</h6>
                                                                    <h3>LKR {{ formatWithCommas(totalIncome) }}</h3>
                                                                </div>
                                                                <div class="icon-box bg-primary">
                                                                    <svg width="12" height="20" viewBox="0 0 12 20"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M11.4642 13.7074C11.4759 12.1252 10.8504 10.8738 9.60279 9.99009C8.6392 9.30968 7.46984 8.95476 6.33882 8.6137C3.98274 7.89943 3.29927 7.52321 3.29927 6.3965C3.29927 5.14147 4.93028 4.69493 6.32655 4.69493C7.34341 4.69493 8.51331 5.01109 9.23985 5.47964L10.6802 3.24887C9.73069 2.6333 8.43112 2.21342 7.14783 2.0831V0H4.49076V2.22918C2.12884 2.74876 0.640949 4.29246 0.640949 6.3965C0.640949 7.87005 1.25327 9.03865 2.45745 9.86289C3.37331 10.4921 4.49028 10.83 5.56927 11.1572C7.88027 11.8557 8.81873 12.2813 8.80805 13.691L8.80799 13.7014C8.80799 14.8845 7.24005 15.3051 5.89676 15.3051C4.62786 15.3051 3.248 14.749 2.46582 13.9222L0.535522 15.7481C1.52607 16.7957 2.96523 17.5364 4.4907 17.8267V20.0001H7.14783V17.8735C9.7724 17.4978 11.4616 15.9177 11.4642 13.7074Z"
                                                                            fill="#fff" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card">
                                                        <div class="card-body depostit-card">
                                                            <div
                                                                class="depostit-card-media d-flex justify-content-between style-1">
                                                                <div>
                                                                    <h6>Total Customers</h6>
                                                                    <h3>{{ totalCustomers }}</h3>
                                                                </div>
                                                                <div class="icon-box bg-secondary">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12 2C9.79086 2 8 3.79086 8 6C8 8.20914 9.79086 10 12 10C14.2091 10 16 8.20914 16 6C16 3.79086 14.2091 2 12 2Z"
                                                                            fill="#222B40" />
                                                                        <path
                                                                            d="M4 20C4 16.6863 7.58172 14 12 14C16.4183 14 20 16.6863 20 20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V20Z"
                                                                            fill="#222B40" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="progress-box mt-0">
                                                                <div class="d-flex justify-content-between">
                                                                    <p class="mb-0">Complete Task</p>
                                                                    <p class="mb-0">20/28</p>
                                                                </div>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-secondary"
                                                                        style="width:50%; height:5px; border-radius:4px;"
                                                                        role="progressbar"></div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="card same-card">
                                                        <div class="card-body depostit-card p-0">
                                                            <div
                                                                class="depostit-card-media d-flex justify-content-between pb-0">
                                                                <div>
                                                                    <h6>Total Products</h6>
                                                                    <h3>{{ totalProducts }}</h3>
                                                                </div>
                                                                <div class="icon-box bg-primary">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M21 16V8C21 7.46957 20.7893 6.96086 20.4142 6.58579L13.4142 0.585787C13.0391 0.210714 12.5304 0 12 0C11.4696 0 10.9609 0.210714 10.5858 0.585787L3.58579 6.58579C3.21071 6.96086 3 7.46957 3 8V16C3 16.5304 3.21071 17.0391 3.58579 17.4142L10.5858 23.4142C10.9609 23.7893 11.4696 24 12 24C12.5304 24 13.0391 23.7893 13.4142 23.4142L20.4142 17.4142C20.7893 17.0391 21 16.5304 21 16Z"
                                                                            fill="#222B40" />
                                                                    </svg>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-xxl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-header border-0 pb-0 flex-wrap">
                                                    <h4 class="heading mb-0">Monthly Sales</h4>

                                                </div>
                                                <div class="card-body custome-tooltip p-0">
                                                    <ApexChart width="100%" height="300" type="line"
                                                        :options="chartOptions" :series="series" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-xxl-6">
                                            <div class="card overflow-hidden">
                                                <div class="card-header border-0 pb-0 flex-wrap">
                                                    <h4 class="heading mb-0">Customer Enrollment</h4>

                                                </div>
                                                <div class="card-body custome-tooltip p-0">
                                                    <ApexChart type="line" height="300"
                                                        :options="enrollmentChartOptions" :series="enrollment_series" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </template>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { ref, onMounted, computed } from 'vue';
import ApexChart from "vue3-apexcharts";

const props = defineProps({
    totalPendingOrders: Number,
    totalIncome: Number,
    totalCustomers: Number,
    totalProducts: Number,
    monthlySales: Array,
    monthlyCustomers: Array
})

function formatWithCommas(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

const series = ref([
    {
        name: "Sales",
        data: props.monthlySales
    },
]);

const chartOptions = ref({
    chart: {
        type: "line",
        toolbar: { show: false },
    },
    stroke: {
        curve: 'smooth',
        width: 3
    },
    markers: {
        size: 4,
        colors: ["#3b82f6"],
        strokeWidth: 2,
        hover: {
            size: 6
        }
    },
    xaxis: {
        categories: [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        ],
    },
    dataLabels: {
        enabled: false,
    },
    colors: ["#3b82f6"],
    tooltip: {
        y: {
            formatter: (val) => `LKR ${val.toLocaleString()}`,
        },
    },
});

const enrollment_series = ref([
    {
        name: "Enrollments",
        data: props.monthlyCustomers
    },
]);

const enrollmentChartOptions = ref({
    chart: {
        type: "line",
        toolbar: { show: false },
    },
    stroke: {
        curve: 'smooth',
        width: 3
    },
    markers: {
        size: 4,
        colors: ["#10b981"],
        strokeWidth: 2,
        hover: { size: 6 }
    },
    xaxis: {
        categories: [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        ],
    },
    dataLabels: { enabled: false },
    colors: ["#10b981"],
    tooltip: {
        y: {
            formatter: (val) => val.toLocaleString(),
        },
    },
});
</script>
