<template>
    <p><a :href="'/categories/' + category.id">{{ category.title }}</a></p>
</template>

<script>
    export default {
        props: [
            'category'
        ]
    }
</script>

<style>

</style>