<template>
    <div>
        <tiny-post v-for="post in parsedPosts" :post="post" :key="post.id"></tiny-post>
    </div>
</template>

<script>
    export default {
        props: [
            'posts'
        ],
        computed: {
            parsedPosts() {
                return JSON.parse(this.posts);
            }
        }
    }
</script>

<style>

</style>