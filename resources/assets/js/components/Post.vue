<template>
    <div>
        <h3>{{ parsedPost.title}}</h3>
        <div>{{ parsedPost.body}}</div>
        <form :action="url" >
            <button class="btn" type="submit">Edit</button>
        </form>
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
            url() {
                return "/posts/" + this.parsedPost.id + "/edit";
            }
        },
        methods: {

        }
    }
</script>

<style>

</style>