<template>
    <div id="wrap" class="mt-3">
        <div>
            <h5>{{ comment.username}}</h5>
            <p class="text-muted">{{ comment.created_at }}</p>
        </div>

        <p>{{ comment.body }}</p>

        <div v-if="isLoggedIn">
            <button class="btn btn-danger" @click="removeComm">Delete</button>
        </div>
    </div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        props: [
            'comment'
        ],
        data() {
            return {
                isLoggedIn: false
            }
        },
        methods: {
            removeComm() {
                axios.delete('/comments/' + this.comment.id)
                    .then(() => {
                        eventBus.$emit('comment-deleted');   //event listened for in Comments.vue
                    }).catch((error) => {
                        console.log(error.data);
                })
            },
            logIn() {
                this.isLoggedIn = true;
            }
        },
        created() {
            eventBus.$on('logged-in', this.logIn);  //event from Comments.vue
        }
    }
</script>

<style>
    #wrap {
        border-bottom: 1px solid #000099;
        padding: 5px;
    }
</style>