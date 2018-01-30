<template>
    <div class="row">
        <td class="col-6 col-md-4"><span>{{ tag.name }}</span></td>
        <td><button class="btn btn-danger ml-3" @click="removeTag">Remove</button></td>
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
                        eventBus.$emit('tag-deleted');   //event listened for on Tags.vue
                    })
            }
        }
    }
</script>
