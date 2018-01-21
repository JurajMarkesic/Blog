<template>
    <div>
        <h3>{{ post.title}}</h3>
        <div>{{ post.body}}</div>
    </div>
</template>

<script>
    export default {
        props: [
            'post'
        ],
        data() {
            return {

            }
        }

    }
</script>

<style>

</style>