<template>
    <div>
        <h2>{{ parsedPost.title}}</h2>
        <p class="form-text text-muted mb-5">Views: {{ parsedPost.views }}   <span class="ml-5">{{ date }}</span></p>
        <div v-html="parsedPost.body" id="bod"></div>
    </div>
</template>

<script>
    export default {
        props: [
            'post'
        ],
        computed: {
            parsedPost() {
                return JSON.parse(this.post);
            },
            date() {
                let dateArray = this.parsedPost.created_at.split(" ");
                return dateArray[0];
            }
        },
        methods: {

        }
    }
</script>

<style>
    #bod {
        word-break: break-all;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
    h2 {
        color: #000033;
        text-align: center;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
</style>