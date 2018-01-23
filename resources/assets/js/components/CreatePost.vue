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
        <label for="tags">Add Tags:</label>
        <select name="tags" id="tags" v-model="tag">
            <option v-for="tg in parsedTags" :value="tg.id">{{tg.name}}</option>
        </select>
        <p v-for="tagName in tagsSelectedNames">{{ tagName }}</p>
        <button class="btn" @click.prevent="addTag">Add Tag</button>
        <button class="btn" @click.prevent="storePost">Done</button>
    </form>
</template>

<script>

    export default {
        props: [
            'categories', 'tags'
        ],
        data() {
          return {
              title: '',
              body: '',
              category: '',
              tag: '',
              tagsSelected: [],
              tagsSelectedNames: [],
              csrf: ''
          }
        },
        methods: {
            addTag() {
                this.tagsSelected.push(this.tag);

                let name = this.parsedTags[this.tagIndex].name;

                if(!this.tagsSelectedNames.includes(name)) {
                    this.tagsSelectedNames.push(name);
                }
            },
            storePost() {
                axios.post('/posts', {
                    'title': this.title,
                    'body': this.body,
                    'category': this.category,
                    'tags': this.tagsSelected
                }).then((response) => {
                    console.log(response.data);
                    window.location.href = '/posts/' + response.data.id;
                }).catch((error) => {
                    console.log(error.data);
                })

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
            },
            tagIndex() {
                return this.parsedTags.findIndex(o => o.id === this.tag);

            }
        }
    }
</script>

<style>

</style>