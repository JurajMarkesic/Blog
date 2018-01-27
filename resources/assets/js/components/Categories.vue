<template>
<div>
    <h3>Add a Category:</h3>

    <div class="form-group">
        <label for="cat">Name:</label>
        <input type="text" class="form-control" v-model="newCat" id="cat"><br>
        <button class="btn btn-primary" @click.prevent="addCat">Add</button>
    </div>

    <category v-for="category in categories" :category="category" :key="category.id"></category>

</div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        data() {
            return {
                categories: [],
                category: '',
                newCat: ''
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
            },
            addCat() {
                axios.post('/categories/store', {
                    'title' : this.newCat
                }).then((response) => {
                    this.fetchCategories();
                }).catch((error) => {
                    console.log(error.data);
                })
            }

        },
        created() {
            this.fetchCategories();
            eventBus.$on('cat-deleted', this.fetchCategories);
        }
    }
</script>

<style>

</style>