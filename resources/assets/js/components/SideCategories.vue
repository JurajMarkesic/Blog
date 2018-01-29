<template>
    <div>
        <h3 class="bg-dark text-white">Categories</h3>
        <side-category v-for="category in categories" :category="category" :key="category.id"></side-category>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                category: ''
            }
        },
        methods: {
            fetchCategories() {
                axios.get('/categories/all')
                    .then((response) => {
                        this.categories = response.data.categories;
                    }).catch((error) => {
                        console.log(error.data);
                })
            }
        },
        created() {
            this.fetchCategories();
        }
    }
</script>

<style>

</style>