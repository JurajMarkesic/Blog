<template>
    <div>
        <span>{{ tag.name }}</span>
        <button class="btn btn-danger ml-3" @click="removeTag">Remove</button>
    </div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        props: [
            'tag'
        ],
        computed: {
            url() {
                return '/tags/' + this.tag.id;
            }
        },
        methods: {
            removeTag() {
                axios.delete(this.url +  '/delete')
                    .then((response) => {
                        eventBus.$emit('tag-deleted');
                    })
            }
        }
    }
</script>

<style>

</style>