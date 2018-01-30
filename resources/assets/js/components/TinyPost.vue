<template>
    <div id="postWrap">
        <h2><a :href="url">{{ post.title}}</a></h2>
        <p id="bod" v-html="post.body"></p>

        <div class="row">
            <a :href="'/posts/' + post.id" class="col-6 offset-3 col-md-4 offset-md-5">
                <button class="btn bg-dark text-white">Read the post</button>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'post'
        ],
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
        line-height: 1.2em;
        height: 7.2em;
        overflow:hidden;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
    }

    #postWrap {
        margin-bottom: 3rem;
    }

    h2 a {
        color: #000033;
    }
</style>