<template>
    <div>
        <h3>Posts:</h3>
        <p v-for="post in posts" :key="post.id">
            <a :href="'/posts/' + post.id">{{ post.title }}</a>
        </p>
    </div>
</template>

<script>
    export default {
        props: [
            'posts'
        ],
    }
</script>
