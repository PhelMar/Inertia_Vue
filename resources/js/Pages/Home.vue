<template>
    <Layout>
        <div>Home</div>
        <Link :href="route('products.index')">Product</Link>
    </Layout>
</template>

<script setup>
import Layout from "../Layouts/Layout.vue";
</script>
