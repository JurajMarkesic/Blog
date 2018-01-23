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

        <label for="tags">Add Tags:</label>
        <select name="tags" id="tags" v-model="tag">
            <option v-for="tg in parsedTags" :value="tg.id">{{tg.name}}</option>
        </select>
        <p v-for="tagName in tagsSelectedNames">{{ tagName }}</p>

        <button class="btn" @click.prevent="addTag">Add Tag</button>
        <button class="btn" @click="editPost">Done</button>
        <button class="btn" @click="deletePost">Delete</button>
    </div>
</template>

<script>
    export default {
        props: [
            'post', 'categories', 'tags', 'tagsselected'
        ],
        data() {
          return {
              title: '',
              body: '',
              tag: '',
              tagsSelectedNames: [],
              tagsSelectedFinal: []
          }
        },
        created() {
            this.title = this.parsedPost.title;
            this.body = this.parsedPost.body;
            this.category = this.parsedPost.category;
            this.parsedTagsSelected.forEach((element) => {
                this.tagsSelectedNames.push(element.name);
                this.tagsSelectedFinal.push(element.id);
            });

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
            tagIndex() {
                return this.parsedTags.findIndex(o => o.id === this.tag);

            },
            parsedTagsSelected() {
                return JSON.parse(this.tagsselected);
            }
        },
        methods: {
            editPost() {
                axios.put(this.url, {
                    'title': this.title,
                    'body': this.body,
                    'category': this.category,
                    'tags': this.tagsSelectedFinal
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
            addTag() {
                if(!this.tagsSelectedFinal.includes(this.tag)) {
                    this.tagsSelectedFinal.push(this.tag);
                }

                let name = this.parsedTags[this.tagIndex].name;

                if(!this.tagsSelectedNames.includes(name)) {
                    this.tagsSelectedNames.push(name);
                }
            }
        }
    }
</script>

<style>

</style>