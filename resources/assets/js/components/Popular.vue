<template>
    <div>
        <h3>Popular:</h3>
        <popular-post v-for="post in posts" :post="post" :key="post.id"></popular-post>
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
                axios.get('/posts/popular')
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