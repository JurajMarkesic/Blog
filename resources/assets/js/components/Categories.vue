<template>
<div>
    <h3>Add a Category:</h3>

    <div class="form-group">
        <label for="cat">Name:</label>
        <input type="text" class="form-control" v-model="newCat" id="cat" @keyup="clearErrors">
        <span class="text-muted">{{ error }}</span><br>
        <button class="btn bg-dark text-white" @click.prevent="addCat">Add</button>
    </div>

   <table class="table table-striped">
       <tr><category v-for="category in categories" :category="category" :key="category.id"></category></tr>
   </table>

</div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        data() {
            return {
                categories: [],
                category: '',
                newCat: '',
                error: ''
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
                    console.log(error.response.data.errors);
                    this.error = error.response.data.errors.title[0];
                })
            },
            clearErrors() {
                this.error = '';
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