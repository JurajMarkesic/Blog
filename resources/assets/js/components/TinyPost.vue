<template>
    <div>
        <h3><a :href="url">{{ post.title}}</a></h3>
        <div id="bod" v-html="post.body"></div>
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
        },
        computed: {
            url() {
                return "/posts/" + this.post.id;
            }
        }

    }
</script>

<style>
    #bod {
        word-break: break-all;
    }
</style>