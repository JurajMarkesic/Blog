<template>
    <div>
        <tiny-post v-for="post in parsedPosts" :post="post" :key="post.id"></tiny-post>
        <p v-if="!hasPosts" class="h3 text-warning mt-5">No posts matched you query. </p>
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
            },
            hasPosts() {
                return this.parsedPosts.length;
            }
        }
    }
</script>

<style>

</style>