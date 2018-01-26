<template>
    <div id="postWrap">
        <h2><a :href="url">{{ post.title}}</a></h2>
        <div id="bod" v-html="post.body"></div>
        <div class="row">
            <a :href="'/posts/' + post.id" class="col-6 offset-3 col-md-4 offset-md-5">
                <button class="btn btn-info text-white">Read the post</button>
            </a>
        </div>
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
        height: 10rem;
        overflow:hidden;
    }

    #postWrap {
        margin-bottom: 3rem;
    }

</style>