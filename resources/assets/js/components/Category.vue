<template>
    <div class="row">
        <td class="col-6 col-md-4"><a :href="url">{{ category.title }}</a></td>
        <td><button class="btn btn-danger ml-3" @click="removeCat">Remove</button></td>
    </div>
</template>

<script>
    import { eventBus } from '../app.js';

    export default {
        props: [
            'category'
        ],
        computed: {
            url() {
                return '/categories/' + this.category.id;
            }
        },
        methods: {
            removeCat() {
                axios.delete(this.url + '/delete')
                    .then(() => {
                        eventBus.$emit('cat-deleted');  //event listened for on Categories.vue
                    })
            }
        }
    }
</script>
