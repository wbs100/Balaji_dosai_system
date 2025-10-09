<template>
    <DashboardLayout title="Add New Product">
        <template #content>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3 mb-md-4">
                                <div class="col-md-12 align-items-center">
                                    <h3 class="mb-0">Add New Product</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="basic-form">
                                        <form @submit.prevent="submit">
                                            <div class="row">
                                                <!-- Category -->
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label required">Select Category</label>
                                                    <Multiselect v-model="selectedCategory" :options="categories"
                                                        :showLabels="false" :close-on-select="true"
                                                        :clear-on-select="false" :searchable="true" label="name"
                                                        track-by="id" placeholder="Select a category" />
                                                    <div v-if="validationErrors.category_id" class="invalid-feedback">
                                                        {{ validationErrors.category_id }}
                                                    </div>
                                                </div>

                                                <!-- Brand -->
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Select Brand</label>
                                                    <Multiselect v-model="selectedBrand" :options="filteredBrands"
                                                        :showLabels="false" :close-on-select="true"
                                                        :clear-on-select="false" :searchable="true" label="name"
                                                        track-by="id" placeholder="Select a brand" />
                                                    <div v-if="validationErrors.brand_id" class="invalid-feedback">
                                                        {{ validationErrors.brand_id }}
                                                    </div>
                                                </div>

                                                <!-- Product Name -->
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label required">Product Name</label>
                                                    <input v-model="product.name" type="text" class="form-control"
                                                        placeholder="Product Name" />
                                                    <div v-if="validationErrors.name" class="invalid-feedback">
                                                        {{ validationErrors.name }}
                                                    </div>
                                                </div>

                                                <!-- Product SKU -->
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label required">Product SKU</label>
                                                    <input v-model="product.sku" type="text" class="form-control"
                                                        placeholder="Product SKU" />
                                                    <div v-if="validationErrors.sku" class="invalid-feedback">
                                                        {{ validationErrors.sku }}
                                                    </div>
                                                </div>

                                                <!-- Product Cost -->
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label required">Product Cost</label>
                                                    <input v-model="product.cost_price" type="text" class="form-control"
                                                        placeholder="Product Cost" />
                                                    <div v-if="validationErrors.cost_price" class="invalid-feedback">
                                                        {{ validationErrors.cost_price }}
                                                    </div>
                                                </div>

                                                <!-- Selling Price -->
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label required">Selling Price</label>
                                                    <input v-model="product.selling_price" type="text"
                                                        class="form-control" placeholder="Selling Price" />
                                                    <div v-if="validationErrors.selling_price" class="invalid-feedback">
                                                        {{ validationErrors.selling_price }}
                                                    </div>
                                                </div>

                                                <!-- Discount -->
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label">Discount</label>
                                                    <input v-model="product.product_discount" type="text"
                                                        class="form-control" placeholder="Discount" />
                                                    <div v-if="validationErrors.product_discount"
                                                        class="invalid-feedback">
                                                        {{ validationErrors.product_discount }}
                                                    </div>
                                                </div>

                                                <!-- Description with Quill Editor -->
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Description</label>
                                                    <QuillEditor v-model="product.description"
                                                        placeholder="Enter product description..." height="250px" />
                                                    <div v-if="validationErrors.description"
                                                        class="invalid-feedback d-block">
                                                        {{ validationErrors.description }}
                                                    </div>
                                                </div>

                                                <!-- Images -->
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Images (Max 4)</label>
                                                    <input type="file" multiple accept="image/*" @change="handleImages"
                                                        class="form-control" ref="imageInput" />
                                                    <div v-if="validationErrors.images" class="invalid-feedback">
                                                        {{ validationErrors.images }}
                                                    </div>

                                                    <!-- Preview Area -->
                                                    <div class="d-flex flex-wrap gap-3 mt-3">
                                                        <div v-for="(image, index) in previewImages" :key="index"
                                                            class="position-relative">
                                                            <img :src="image.url" class="rounded border"
                                                                style="width: 100px; height: 100px; object-fit: cover" />

                                                            <button type="button" @click="removeImage(index)"
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0">
                                                                &times;
                                                            </button>

                                                            <div class="form-check mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="primaryImage" :value="index"
                                                                    v-model="primaryImageIndex" />
                                                                <label class="form-check-label">Primary</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Create Product</button>
                                        </form>
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
import QuillEditor from '@/Components/QuillEditor.vue';
import { ref, computed, watch } from 'vue'
import Multiselect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.css'
import { router } from '@inertiajs/vue3'
import { ValidationMixin } from '@/plugins/mixins'
import axios from 'axios';

const props = defineProps({
    categories: Array,
    brands: Array
})

const product = ref({
    name: '',
    sku: '',
    description: '',
    status: 'active',
    images: [],
    category_id: null,
    brand_id: null,
    cost_price: '',
    selling_price: '',
    product_discount: '',
});

const selectedCategory = ref(null)
const selectedBrand = ref(null)

const previewImages = ref([]);
const primaryImageIndex = ref(0);
const imageInput = ref(null);

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

const filteredBrands = computed(() => {
    if (!selectedCategory.value) return []
    return props.brands.filter((brand) =>
        brand.categories?.some((cat) => cat.id === selectedCategory.value.id)
    )
})

watch(selectedCategory, (val) => {
    product.value.category_id = val?.id || ''
    selectedBrand.value = null
})

watch(selectedBrand, (val) => {
    product.value.brand_id = val?.id || ''
})

function handleImages(e) {
    const files = Array.from(e.target.files);
    product.value.images = files;

    previewImages.value = files.map(file => ({
        url: URL.createObjectURL(file),
        file: file
    }));

    primaryImageIndex.value = 0;
}

function removeImage(index) {
    previewImages.value.splice(index, 1);
    product.value.images.splice(index, 1);

    if (primaryImageIndex.value === index) {
        primaryImageIndex.value = 0;
    } else if (primaryImageIndex.value > index) {
        primaryImageIndex.value -= 1;
    }
}

const submit = async () => {
    try {
        if (selectedCategory.value) {
            product.value.category_id = selectedCategory.value.id;
        }

        if (selectedBrand.value) {
            product.value.brand_id = selectedBrand.value.id;
        }

        const formData = new FormData();

        for (const key in product.value) {
            if (key === 'images') continue;
            if (product.value[key] !== undefined && product.value[key] !== null) {
                formData.append(key, product.value[key]);
            }
        }

        if (product.value.images && product.value.images.length > 0) {
            product.value.images.forEach(file => {
                formData.append('images[]', file);
            });

            formData.append('primary_image', primaryImageIndex.value);
        }

        for (let pair of formData.entries()) {
            console.log(pair[0] + ':', pair[1]);
        }

        await axios.post(route('product.store'), formData).then(() => {

            ValidationMixin.methods.successMessage("Product added successfully");
            resetValidationErrors();

            product.value.name = '';
            product.value.sku = '';
            product.value.description = '';
            product.value.cost_price = '';
            product.value.selling_price = '';
            product.value.product_discount = '';
            product.value.status = 'active';
            product.value.images = [];
            product.value.category_id = null;
            product.value.brand_id = null;

            selectedCategory.value = null;
            selectedBrand.value = null;

            if (imageInput.value) {
                imageInput.value.value = null;
            }

            previewImages.value = [];
            primaryImageIndex.value = 0;
        });

    } catch (error) {
        convertValidationError(error);
    }
};
</script>
