<template>
    <div>
        <post v-for="post in parsedPosts" :post="post" :key="post.id"></post>
    </div>
</template>

<script>
    export default {
        props: [
          'posts'
        ],
        data() {
            return {

            }
        },
        computed: {
            parsedPosts() {
                return JSON.parse(this.posts);
            }
        }
    }
</script>

<style>

</style>