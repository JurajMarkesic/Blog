<template>
    <div>
        <h2>{{ post.title}}</h2>
        <p class="form-text text-muted mb-5">Views: {{ post.views }}  <span class="ml-5">{{ date }}</span></p>
        <div v-html="post.body" id="bod"></div>
    </div>
</template>

<script>
    export default {
        props: [
            'post'
        ],
        computed: {
            date() {
                let dateArray = this.post.created_at.split(" ");  //shows only the date and not the time
                return dateArray[0];
            }
        }
    }
</script>

<style>
    #bod {
        word-break: break-all;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
    h2 {
        color: #000033;
        text-align: center;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
</style>