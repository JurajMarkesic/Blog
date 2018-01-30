<template>
    <div class="card">
        <div class="card-header"><h3 class="h2">Comments:</h3></div>

        <div class="card-body">
            <comment v-for="comment in comments" :comment="comment" :key="comment.id"></comment>
            <div class="clearfix"></div>
            <form action="" class="form mt-5">
                <h3>Add a comment:</h3>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" v-model="username">
                </div>

                <div class="form-group">
                    <label for="body">Comment:</label>
                    <textarea class="form-control" id="body" v-model="body"></textarea>
                </div>

                <button class="btn btn-dark" @click.prevent="addComment">Post</button>
            </form>
        </div>
    </div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        props: [
            'post'
        ],
        data() {
            return {
                comments: [],
                comment: '',
                body: '',
                username: ''
            }
        },
        methods: {
            fetchComments() {
                this.body = '';
                this.username = '';
                axios.get('/comments/' + this.post.id)
                    .then((response) => {
                        this.comments = response.data;
                    }).catch((error) => {
                        console.log(error.data);
                })
            },
            addComment() {
                axios.post('/comments', {
                    'body': this.body,
                    'username': this.username,
                    'post_id': this.post.id
                }).then(() => {
                    this.fetchComments();
                    this.checkIfLoggedIn();
                }).catch((error) => {
                    console.log(error.data);
                })
            },
            checkIfLoggedIn() {
                axios.get('/logged')
                    .then((response) => {
                        if(response.data.isLoggedIn == true) {
                            eventBus.$emit('logged-in');       //listened for on Comment.vue
                        }
                    })
            }
        },
        created() {
            this.fetchComments();
            eventBus.$on('comment-deleted', this.fetchComments); //event from Comment.vue
        },
        mounted() {
            this.checkIfLoggedIn();
        }
    }
</script>

<style>
    textarea {
        height: 9em;
    }
    h3 {
        color: #00004d !important;
    }
</style>