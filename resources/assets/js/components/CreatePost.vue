<template>
    <form action="/posts" method="POST" class="form">
        <input type="hidden" name="_token" :value="csrf">

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" v-model="title" @keyup="clearErrors">
            <span class="text-muted">{{ errors.title }}</span><br>
        </div>

        <!--vueTinymce wysiwyg editor-->
        <div class="form-group">
            <vue-tinymce v-model="body" id="bod" @change="clearErrors"></vue-tinymce>
            <span class="text-muted">{{ errors.body }}</span><br>
        </div>


        <label for="category">Category:</label>
        <select name="category" id="category" v-model="category" class="form-control" @change="clearErrors">
            <option v-for="cat in categories" :value="cat.id">{{cat.title}}</option>
        </select>
        <span class="text-muted">{{ errors.category }}</span><br><br>

        <!--imported select component-->
        <label for="tags">Add Tags:</label><br>
        <v-select label="name" :options="tags" id="tags" v-model="tagsSelected"  multiple></v-select>

        <br>

        <button class="btn btn-success" @click.prevent="storePost">Done</button>
    </form>
</template>

<script>

    import vueTinymce from '../app.js';

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
              csrf: '',
              errors: {
                  title: '',
                  body: '',
                  category: ''
              }
          }
        },
        methods: {
            storePost() {
                let tagIds = this.tagsSelected.map(a => a.id);

                axios.post('/posts', {
                    'title': this.title,
                    'body': this.body,
                    'category': this.category,
                    'tags': tagIds
                }).then((response) => {
                    window.location.href = '/posts/' + response.data.id;
                }).catch((error) => {
                    if(error.response.data.errors.title) {
                        this.errors.title = error.response.data.errors.title[0];
                    }
                    if(error.response.data.errors.body) {
                        this.errors.body = error.response.data.errors.body[0];
                    }
                    if(error.response.data.errors.category) {
                        this.errors.category = error.response.data.errors.category[0];
                    }
                })
            },
            removeTag(tagName) {
               let i = this.tagsSelected.indexOf(tagName);

               this.tagsSelected.splice(i,1);
            },
            clearErrors() {
                this.errors = {
                        title: '',
                        body: '',
                        category: ''
                };
            }
        },
        created() {
            this.csrf = window.Laravel.csrfToken;
            console.log("This error happens because tinyMCE editor mounts with no content. This is a bug in the vue-tinymce package.")
        }
    }
</script>

<style>

</style>