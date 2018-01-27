<template>
    <div>
        <h3>Add a Tag</h3>

        <div class="form-group">
            <label for="tg">Name:</label>
            <input type="text" class="form-control" v-model="newTag" id="tg"><br>
            <button class="btn btn-primary" @click.prevent="addTag">Add</button>
        </div>

        <tag v-for="tag in tags" :tag="tag" :key="tag.id"></tag>

    </div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        data() {
            return {
                tags: [],
                tag: '',
                newTag: ''
            }
        },
        methods: {
            fetchTags() {
                axios.get('/tags')
                    .then((response) => {
                        this.tags = response.data.tags;
                    }).catch((error) => {
                    console.log(error.data);
                })
            },
            addTag() {
                axios.post('/tags/store', {
                    'name' : this.newTag
                }).then((response) => {
                    this.fetchTags();
                }).catch((error) => {
                    console.log(error.data);
                })
            }

        },
        created() {
            this.fetchTags();
            eventBus.$on('tag-deleted', this.fetchTags);
        }
    }
</script>

<style>

</style>