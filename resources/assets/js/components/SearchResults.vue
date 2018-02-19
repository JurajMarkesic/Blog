<template>
    <div>
        <h2 class="ml-3">Search Results:</h2><br><br>
        <tiny-post v-for="post in posts" :post="post" :key="post.id"></tiny-post>
        <p v-if="!hasPosts" class="h3 text-warning mt-5">No posts matched you query. </p>
    </div>
</template>

<script>
    export default {
        props: [
            'posts'
        ],
        computed: {
            hasPosts() {
                return this.posts.length;
            }
        }
    }
</script>

<style>

</style>