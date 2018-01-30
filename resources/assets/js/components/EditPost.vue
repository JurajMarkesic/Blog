<template>
    <div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" v-model="title" @keyup="clearErrors">
            <span class="text-muted">{{ errors.title }}</span><br>
        </div>

        <!--vueTinymce wysiwyg editor-->
        <vue-tinymce :data="body" v-model="body" id="bod" @change="clearErrors"></vue-tinymce>
        <span class="text-muted">{{ errors.body }}</span><br>

        <label for="category">Category:</label>
        <select name="category" id="category" v-model="category" class="form-control" @change="clearErrors">
            <option v-for="cat in categories" :value="cat.id">{{cat.title}}</option>
        </select><span class="text-muted">{{ errors.category }}</span><br><br>

        <label for="tags">Add Tags:</label><br>
        <!--imported select component-->
        <v-select label="name" :options="tags" id="tags" v-model="tagsSelected"  multiple @change="clearErrors"></v-select>
        <br>

        <button class="btn btn-success" @click="editPost">Done</button>
        <button class="btn btn-danger" @click="deletePost">Delete</button>
    </div>
</template>

<script>
    import vueTinymce from '../app.js';

    export default {
        props: [
            'post', 'categories', 'tags', 'tagsselected'
        ],
        data() {
          return {
              title: this.post.title,
              body: this.post.body,
              category: this.post.category,
              tag: '',
              tagsSelected: this.tagsselected,
              errors: {
                  title: '',
                  body: '',
                  category: ''
              }
          }
        },
        computed: {
            url() {
                return "/posts/" + this.post.id;
            },
        },
        methods: {
            editPost() {
                let tagIds = this.tagsSelected.map(a => a.id);
                axios.put(this.url, {
                    'title': this.title,
                    'body': this.body,
                    'category': this.category,
                    'tags': tagIds
                }).then((response) => {
                    console.log(response.data);
                    window.location.href = this.url;        //redirects to post's show method
                }).catch((error) => {
                    console.log(error.response.data.errors);
                    if(error.response.data.errors.title) {
                        this.errors.title = error.response.data.errors.title[0];
                    }
                    if(error.response.data.errors.body) {
                        this.errors.body = error.response.data.errors.body[0];
                    }
                    if(error.response.data.errors.category) {
                        this.errors.category = error.response.data.errors.category[0];
                    }})
            },
            deletePost() {
                axios.delete(this.url)
                    .then(
                        window.location.href = "/"  //redirects to the landing page
                    );
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
        }
    }
</script>

<style>
    #bod {
        word-break: break-all;
    }
</style>