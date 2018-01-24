<template>
    <div>
        <span><a :href="'/posts/' + post.id">{{ post.title }}</a></span>
        <span class="text-muted">Views: {{ post.views }}</span>
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