<template>
    <DashboardLayout title="Update Product">
        <template #content>
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3 mb-md-4">
                                <div class="col-md-12 align-items-center">
                                    <h3 class="mb-0">Update Product</h3>
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
                                                        label="name" track-by="id" placeholder="Select a category" />
                                                    <div v-if="validationErrors.category_id" class="invalid-feedback">
                                                        {{ validationErrors.category_id }}
                                                    </div>
                                                </div>

                                                <!-- Brand -->
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Select Brand</label>
                                                    <Multiselect v-model="selectedBrand" :options="filteredBrands"
                                                        label="name" track-by="id" placeholder="Select a brand" />
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

                                                <!-- SKU -->
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label required">SKU</label>
                                                    <input v-model="product.sku" type="text" class="form-control"
                                                        placeholder="Product SKU" />
                                                    <div v-if="validationErrors.sku" class="invalid-feedback">
                                                        {{ validationErrors.sku }}
                                                    </div>
                                                </div>

                                                <!-- Prices -->
                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label required">Cost Price</label>
                                                    <input v-model="product.cost_price" type="number"
                                                        class="form-control" placeholder="Cost Price" />
                                                    <div v-if="validationErrors.cost_price" class="invalid-feedback">
                                                        {{ validationErrors.cost_price }}
                                                    </div>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label required">Selling Price</label>
                                                    <input v-model="product.selling_price" type="number"
                                                        class="form-control" placeholder="Selling Price" />
                                                    <div v-if="validationErrors.selling_price" class="invalid-feedback">
                                                        {{ validationErrors.selling_price }}
                                                    </div>
                                                </div>

                                                <div class="mb-3 col-md-4">
                                                    <label class="form-label">Discount</label>
                                                    <input v-model="product.product_discount" type="number"
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

                                                <!-- Image Upload -->
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label">Images (Max 4)</label>
                                                    <input type="file" multiple accept="image/*" @change="handleImages"
                                                        class="form-control" ref="imageInput" />
                                                    <div v-if="validationErrors.images" class="invalid-feedback">
                                                        {{ validationErrors.images }}
                                                    </div>

                                                    <!-- Image Preview -->
                                                    <div class="d-flex flex-wrap gap-3 mt-3">
                                                        <div v-for="(image, index) in combinedPreviewImages"
                                                            :key="image.id || index" class="position-relative">
                                                            <img :src="image.url" class="rounded border"
                                                                style="width: 100px; height: 100px; object-fit: cover" />
                                                            <div class="form-check mt-1">
                                                                <input class="form-check-input" type="radio"
                                                                    name="primaryImage" :value="index"
                                                                    v-model="primaryImageIndex" />
                                                                <label class="form-check-label">Primary</label>
                                                            </div>

                                                            <button v-if="!image.existing" type="button"
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0"
                                                                @click="removeNewImage(index)">
                                                                &times;
                                                            </button>

                                                            <button v-if="image.existing" type="button"
                                                                class="btn btn-warning btn-sm position-absolute top-0 end-0"
                                                                @click="removeExistingImage(image.id)">
                                                                &times;
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-success">Update Product</button>
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
import Multiselect from 'vue-multiselect';
import { ref, computed, watch, onMounted } from 'vue';
import axios from 'axios';
import { ValidationMixin } from '@/plugins/mixins';

const props = defineProps({
    categories: Array,
    brands: Array,
    productData: Object,
});

const product = ref({ ...props.productData });

const selectedCategory = ref(null);
const selectedBrand = ref(null);

const primaryImageIndex = ref(0);
const imageInput = ref(null);

const newImages = ref([]);
const existingImages = ref([]);

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

if (props.productData.images && props.productData.images.length > 0) {
    existingImages.value = props.productData.images.map(img => ({
        id: img.id,
        url: img.full_url || '/' + img.image_path,
        is_primary: img.is_primary,
        sort_order: img.sort_order,
        existing: true,
    }));

    const primary = existingImages.value.findIndex(img => img.is_primary);
    if (primary >= 0) primaryImageIndex.value = primary;
}

const filteredBrands = computed(() => {
    if (!selectedCategory.value) return [];
    return props.brands.filter(brand =>
        brand.categories?.some(cat => cat.id === selectedCategory.value.id)
    );
});

watch(selectedCategory, val => {
    product.value.category_id = val?.id || '';
    selectedBrand.value = null;
});

watch(selectedBrand, val => {
    product.value.brand_id = val?.id || '';
});

const combinedPreviewImages = computed(() => [
    ...existingImages.value,
    ...newImages.value.map((file, index) => ({
        url: URL.createObjectURL(file),
        file,
        existing: false,
        id: `new-${index}`,
    }))
]);

function handleImages(e) {
    const files = Array.from(e.target.files);

    if (existingImages.value.length + newImages.value.length + files.length > 4) {
        alert('You can upload max 4 images.');
        return;
    }

    newImages.value = [...newImages.value, ...files];

    if (primaryImageIndex.value >= combinedPreviewImages.value.length) {
        primaryImageIndex.value = 0;
    }
}

function removeNewImage(index) {
    newImages.value.splice(index, 1);

    if (primaryImageIndex.value >= combinedPreviewImages.value.length) {
        primaryImageIndex.value = 0;
    }
}

function removeExistingImage(id) {
    const idx = existingImages.value.findIndex(img => img.id === id);
    if (idx !== -1) {
        existingImages.value.splice(idx, 1);

        if (primaryImageIndex.value >= combinedPreviewImages.value.length) {
            primaryImageIndex.value = 0;
        }
    }
}

const submit = async () => {
    const formData = new FormData();

    for (const key in product.value) {
        if (key === 'images') continue;
        formData.append(key, product.value[key] ?? '');
    }

    newImages.value.forEach(file => {
        formData.append('images[]', file);
    });

    const keepImageIds = existingImages.value.map(img => img.id);
    formData.append('keep_images', JSON.stringify(keepImageIds));

    formData.append('primary_image', primaryImageIndex.value);

    try {
        await axios.post(route('product.update', product.value.id), formData, {
            headers: { 'Content-Type': 'multipart/form-data' },
        });

        ValidationMixin.methods.successMessage('Product updated successfully');
        resetValidationErrors();

    } catch (error) {
        convertValidationError(error);
    }
};

onMounted(() => {
    selectedCategory.value = props.categories.find(c => c.id == product.value.category_id) || null;
    selectedBrand.value = props.brands.find(b => b.id == product.value.brand_id) || null;
});
</script>
