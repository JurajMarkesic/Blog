<template>
    <div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" v-model="title">
        </div>
        <vue-tinymce :data="body" v-model="body" id="bod"></vue-tinymce>
        <br>
        <label for="category">Category:</label>
        <select name="category" id="category" v-model="category" class="form-control">
            <option v-for="cat in parsedCategories" :value="cat.id">{{cat.title}}</option>
        </select><br><br>

        <label for="tags">Add Tags:</label><br>
        <v-select label="name" :options="parsedTags" id="tags" v-model="tagsSelected"  multiple>
        </v-select>
        <br>
        <button class="btn btn-success" @click="editPost">Done</button>
        <button class="btn btn-danger" @click="deletePost">Delete</button>
    </div>
</template>

<script>
    import vueTinymce from '../app.js'


    export default {
        props: [
            'post', 'categories', 'tags', 'tagsselected'
        ],
        data() {
          return {
              title: '',
              body: '',
              tag: '',
              tagsSelected: []
          }
        },
        created() {
            this.title = this.parsedPost.title;
            this.body = this.parsedPost.body;
            this.category = this.parsedPost.category;
            this.tagsSelected = this.parsedTagsSelected;
        },
        computed: {
            parsedPost() {
                return JSON.parse(this.post);
            },
            parsedCategories() {
                return JSON.parse(this.categories);
            },
            url() {
                return "/posts/" + this.parsedPost.id;
            },
            parsedTags() {
                return JSON.parse(this.tags);
            },
            parsedTagsSelected() {
                return JSON.parse(this.tagsselected);
            }
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
                    window.location.href = this.url;
                })
            },
            deletePost() {
                axios.delete(this.url)
                    .then(
                        window.location.href = "/"
                    );
            },
            removeTag(tagName) {
                let i = this.tagsSelected.indexOf(tagName);

                this.tagsSelected.splice(i,1);
            }
        }
    }
</script>

<style>
    #bod {
        word-break: break-all;
    }
</style>