<template>
    <div>
        <span>{{ post.title }}</span>
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