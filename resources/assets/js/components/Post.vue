<template>
    <div>
        <h3>{{ parsedPost.title}}</h3>
        <p class="form-text text-muted">Views: {{ parsedPost.views }}</p>
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
        },
        methods: {

        }
    }
</script>

<style>
    #bod {
        word-break: break-all;
    }
</style>