<template>
    <Layout>
        <div
            v-if="$page.props.flash.message"
            class="alert bg-green-400 text-white mt-4 mx-5 px-4 py-2"
        >
            {{ $page.props.flash.message }}
        </div>
        <div class="mx-4 mt-4">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold">Product List</h2>
                <Link
                    :href="route('products.create')"
                    class="bg-blue-400 rounded px-2 py-2 text-white p-3 mb-4"
                    >Add Product</Link
                >
            </div>
            <table class="w-full bg-white border border-gray-200 shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left border">ID</th>
                        <th class="px-4 py-2 text-left border">PRODUCT NAME</th>
                        <th class="px-4 py-2 text-left border">
                            PRODUCT PRICE
                        </th>
                        <th class="px-4 py-2 text-left border">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in products" :key="index">
                        <td class="px-4 py-2 text-left border">
                            {{ item.id }}
                        </td>
                        <td class="px-4 py-2 text-left border">
                            {{ item.product_name }}
                        </td>
                        <td class="px-4 py-2 text-left border">
                            {{ item.product_price }}
                        </td>
                        <td class="border px-4 py-2">
                            <Link
                                :href="route('products.show', item.id)"
                                class="bg-blue-200 text-dark p-3 rounded px-2 py-2 me-2 text-sm inline-block"
                                >Show</Link
                            >
                            <Link
                                :href="route('products.edit', item.id)"
                                class="bg-green-400 text-white p-3 rounded px-2 py-2 me-2 text-sm inline-block"
                                >Edit</Link
                            >
                            <button
                                type="submit"
                                class="bg-red-600 text-white p-3 rounded px-2 py-2 me-2 text-sm inline-block"
                                @click="deleteProduct(item.id)"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Layouts/Layout.vue";

defineProps({
    products: Array,
});

const form = useForm({});

const deleteProduct = (productId) => {
    if (confirm("Are you sure you want to delete this product Item?")) {
        form.delete(route("products.destroy", productId));
    }
};
</script>
