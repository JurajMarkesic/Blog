<template>
    <div>
        <tiny-post v-for="post in posts" :post="post" :key="post.id"></tiny-post>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: []
            }
        },
        created() {
            this.fetchPosts();
        },
        methods: {
           fetchPosts() {
               axios.get('/posts')
                   .then((response) => {
                       console.log(response.data.msg);
                       this.posts = response.data.posts;
                   }).catch((error) => {
                       console.log(error.data);
                   }
               )
           }
        }
    }
</script>

<style>

</style>