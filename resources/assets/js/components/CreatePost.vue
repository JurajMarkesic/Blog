<template>
    <form action="/posts" method="POST" class="form">
        <input type="hidden" name="_token" :value="csrf">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" v-model="title">
        </div>
        <div class="form-group">
            <vue-tinymce v-model="body" id="bod"></vue-tinymce>
        </div>
        <br>

        <label for="category">Category:</label>
        <select name="category" id="category" v-model="category">
            <option v-for="cat in parsedCategories" :value="cat.id">{{cat.title}}</option>
        </select><br><br>

        <label for="tags">Add Tags:</label><br>
        <v-select label="name" :options="parsedTags" id="tags" v-model="tagsSelected"  multiple>

        </v-select>
        <br>
        <button class="btn btn-success" @click.prevent="storePost">Done</button>
    </form>
</template>

<script>

    import vueTinymce from '../app.js'

    export default {
        props: [
            'categories', 'tags'
        ],
        data() {
          return {
              title: '',
              body: '',
              category: '',
              tagsSelected: [],
              csrf: ''
          }
        },
        methods: {
            storePost() {
                console.log(this.tagsSelected);
                let tagIds = this.tagsSelected.map(a => a.id);

                axios.post('/posts', {
                    'title': this.title,
                    'body': this.body,
                    'category': this.category,
                    'tags': tagIds
                }).then((response) => {
                    console.log(response.data);
                    window.location.href = '/posts/' + response.data.id;
                }).catch((error) => {
                    console.log(error.data);
                })
            },
            removeTag(tagName) {
               let i = this.tagsSelected.indexOf(tagName);

               this.tagsSelected.splice(i,1);
            }
        },
        mounted() {
            this.csrf = window.Laravel.csrfToken;
        },
        computed: {
            parsedCategories() {
                return JSON.parse(this.categories);
            },
            parsedTags() {
                return JSON.parse(this.tags);
            }
        }
    }
</script>

<style>

</style>