<template>
    <div>
        <h3>Add a Tag:</h3>

        <div class="form-group">
            <label for="tg">Name:</label>
            <input type="text" class="form-control" v-model="newTag" id="tg" @keyup="clearErrors">
            <span class="text-muted">{{ error }}</span><br>
            <button class="btn bg-dark text-white" @click.prevent="addTag">Add</button>
        </div>

        <table class="table table-striped">
            <tr></tr><tag v-for="tag in tags" :tag="tag" :key="tag.id"></tag></tr>
        </table>

    </div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        data() {
            return {
                tags: [],
                tag: '',
                newTag: '',
                error: ''
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
                    console.log(error.response.data.errors);
                    this.error = error.response.data.errors.name[0];
                })
            },
            clearErrors() {
                this.error = '';
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