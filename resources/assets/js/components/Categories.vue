<template>
    <div>
        <h3>Categories:</h3>
        <category v-for="category in categories" :category="category" :key="category.id"></category>
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
                axios.get('/categories')
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