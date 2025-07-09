<template>
    <Layout>
        <div class="mx-4 mt-4">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-4">Product Edit</h2>
            </div>
            <form @submit.prevent="updateProduct()">
                <div class="grid grid-col-12 gap-4">
                    <div class="cols-span-6">
                        <div class="mb-3">
                            <label
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >Product Name</label
                            >
                            <input
                                type="text"
                                v-model="form.product_name"
                                class="py-2 px-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-150 ease-in-out"
                            />
                            <div
                                v-if="form.errors.product_name"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.product_name }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label
                                for=""
                                class="block text-sm font-medium text-gray-700 mb-1"
                                >Product Price</label
                            >
                            <input
                                type="text"
                                v-model="form.product_price"
                                class="py-2 px-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-150 ease-in-out"
                            />
                            <div
                                v-if="form.errors.product_price"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.product_price }}
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <Link
                                :href="route('products.index')"
                                class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg px-5 py-2 transition duration-150"
                                >Back</Link
                            >
                            <button
                                :disabled="form.processing"
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg py-2 px-5 transition duration-150"
                            >
                                <span v-if="form.processing">Updating....</span>
                                <span v-else>Update</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </Layout>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Layouts/Layout.vue";

const props = defineProps({
    product: Object,
});
const form = useForm({
    product_name: props.product.product_name,
    product_price: props.product.product_price,
});

const updateProduct = () => {
    const res = form.put(route("products.update", props.product.id));
    if (res) {
        form.reset();
    }
};
</script>
