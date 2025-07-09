<template>
    <Layout>
        <div class="mx-4 mt-4">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-4">Product Show</h2>
            </div>
            <div class="grid grid-col-12 gap-4">
                <div class="cols-span-6">
                    <div class="mb-3">
                        <label for="" class="font-bold">Product Name</label>
                        <p>{{ product.product_name }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="" class="font-bold">Product Price</label>
                        <p>{{ product.product_price }}</p>
                    </div>
                    <div class="flex space-x-4">
                        <Link
                            :href="route('products.index')"
                            class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg px-5 py-2 transition duration-150"
                            >Back</Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Layouts/Layout.vue";

defineProps({
    product: Object,
});
</script>
