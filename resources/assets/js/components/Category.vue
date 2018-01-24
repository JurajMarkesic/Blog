<template>
    <p><a :href="url">{{ category.title }}</a></p>
</template>

<script>
    export default {
        props: [
            'category'
        ],
        computed: {
            url() {
                return '/categories/' + this.category.id;
            }
        }
    }
</script>

<style>

</style>