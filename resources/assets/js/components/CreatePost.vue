<template>
    <form action="/posts" method="POST" class="form">
        <input type="hidden" name="_token" :value="csrf">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" v-model="title">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="body" v-model="body">
        </div>
        <label for="category">Category:</label>
        <select name="category" id="category" v-model="category">
            <option v-for="cat in parsedCategories" :value="cat.id">{{cat.title}}</option>
        </select>
        <button class="btn" type="submit">Done</button>
    </form>
</template>

<script>

    export default {
        props: [
            'categories'
        ],
        data() {
          return {
              title: '',
              body: '',
              category: '',
              csrf: ''
          }
        },
        methods: {

        },
        mounted() {
            this.csrf = window.Laravel.csrfToken;
        },
        computed: {
            parsedCategories() {
                return JSON.parse(this.categories);
            }
        }
    }
</script>

<style>

</style>