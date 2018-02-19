<template>
    <div id="popularPost">
        <span><a :href="'/posts/' + post.id">{{ post.title }}</a></span>
        <span class="text-muted">{{ post.views }} views</span>
    </div>
</template>

<script>
    export default {
        props: [
            'post'
        ]
    }
</script>

<style>
    @media (max-width: 992px) {
        #popularPost {
            max-width: 95%;
            margin-left: 6px;
        }
    }
</style>