<template>
    <div>
        <h3>Recent:</h3>
        <side-post v-for="post in posts" :post="post" :key="post.id"></side-post>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        methods: {
            fetchPosts() {
                axios.get('/posts/recent')
                    .then((response) => {
                        this.posts = response.data.posts;
                    }).catch((error) => {
                    console.log(error.data);
                })
            }
        },
        created() {
            this.fetchPosts();
        }
    }
</script>

<style>

</style>