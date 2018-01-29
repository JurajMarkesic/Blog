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
        line-height: 1.2em;
        height: 7.2em;
        overflow:hidden;
    }

    #postWrap {
        margin-bottom: 3rem;
    }

    h2 {
        color: #343a40;
    }

</style>