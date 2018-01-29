<template>
    <div>
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

</style>