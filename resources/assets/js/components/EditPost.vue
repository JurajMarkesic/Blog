<template>
    <div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" v-model="title">
        </div>
        <textarea name="body" id="body" cols="30" rows="10" v-model="body"></textarea>
        <label for="category">Category:</label>
        <select name="category" id="category" v-model="category">
            <option v-for="cat in parsedCategories" :value="cat.id">{{cat.title}}</option>
        </select>
        <button class="btn" @click="editPost">Done</button>
        <button class="btn" @click="deletePost">Delete</button>
    </div>
</template>

<script>
    export default {
        props: [
            'post', 'categories'
        ],
        data() {
          return {
              title: '',
              body: ''
          }
        },
        created() {
            this.title = this.parsedPost.title;
            this.body = this.parsedPost.body;
            this.category = this.parsedPost.category;
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
            }
        },
        methods: {
            editPost() {
                axios.put(this.url, {
                    'title': this.title,
                    'body': this.body,
                    'category': this.category
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
            }
        }
    }
</script>

<style>

</style>