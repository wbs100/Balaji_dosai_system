<template>
    <DashboardLayout title="Settings">
        <template #content>
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <h3 class="mb-0">Settings</h3>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-tabs mb-3" id="settings-tabs">
                                <li class="nav-item">
                                    <button class="nav-link"
                                        :class="{ active: activeTab === 'category' || activeTab === 'brand' }"
                                        @click="activeTab = 'category'">
                                        Category & Brand
                                    </button>
                                </li>
                                <!-- <li class="nav-item">
                                    <button class="nav-link" :class="{ active: activeTab === 'brand' }"
                                        @click="activeTab = 'brand'">
                                        Brand
                                    </button>
                                </li> -->
                            </ul>

                            <CategoryTab v-if="activeTab === 'category'" @switchToBrandTab="goToBrandTab" />

                            <BrandTab v-if="activeTab === 'brand'" :category="selectedCategory"
                                @backToCategory="activeTab = 'category'" />
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
import { ref } from 'vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Loader from '@/Components/Basic/LoadingBar.vue';

import CategoryTab from '@/Pages/Admin/Settings/Category/categoryTab.vue';
import BrandTab from '@/Pages/Admin/Settings/Brand/brandTab.vue';

const loading_bar = ref(null);
const activeTab = ref('category');
const selectedCategory = ref({});

const goToBrandTab = (category) => {
    selectedCategory.value = category;
    activeTab.value = 'brand';
};
</script>
