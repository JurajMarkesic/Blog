<template>
    <div>
        <tiny-post v-for="post in posts" :post="post" :key="post.id"></tiny-post>

        <ul class="pagination justify-content-center mt-5 mb-5">
            <!--previous-->
            <li :class="{'page-item': true, 'disabled': !pagination.prev_page_url}">
                <a class="page-link" href="#" aria-label="Previous" @click="fetchPosts(pagination.prev_page_url)"
                   :disabled="!pagination.prev_page_url">
                    <span aria-hidden="true">Previous</span>
                </a>
            </li>
            <!--current page and total pages-->
            <li class="page-item disabled">
                <span class="page-link" style="color: black">Page {{pagination.current_page}} of {{pagination.last_page}}</span>
            </li>
            <!--next-->
            <li :class="{'page-item': true, 'disabled': !pagination.next_page_url}">
                <a class="page-link" href="#" aria-label="Next" @click="fetchPosts(pagination.next_page_url)"
                   :disabled="!pagination.next_page_url">
                    <span aria-hidden="true">Next</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                post: '',
                pagination: {}
            }
        },
        created() {
            this.fetchPosts();
        },
        methods: {
           fetchPosts(page_url) {
               if(typeof(page_url) === 'undefined') {
                   page_url = '/posts';
               }
               axios.get(page_url)
                   .then((response) => {
                       this.posts = response.data.posts.data;
                       this.makePagination(response.data.posts);
                   }).catch((error) => {
                       console.log(error.data);
                   }
               )
           },
            makePagination(data) {
                this.pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                };
            }
        },
    }
</script>
