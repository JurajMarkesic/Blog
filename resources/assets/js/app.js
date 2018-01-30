
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import vueTinymce from '../../../node_modules/@deveodk/vue-tinymce';
import '@deveodk/vue-tinymce/dist/@deveodk/vue-tinymce.css';
Vue.use(vueTinymce);

import vSelect from 'vue-select'
Vue.component('v-select', vSelect);

export default vueTinymce;



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('posts', require('./components/Posts.vue'));
Vue.component('post', require('./components/Post.vue'));
Vue.component('tiny-post', require('./components/TinyPost.vue'));
Vue.component('create-post', require('./components/CreatePost.vue'));
Vue.component('edit-post', require('./components/EditPost.vue'));
Vue.component('popular', require('./components/Popular.vue'));
Vue.component('side-post', require('./components/SidePost.vue'));
Vue.component('recent', require('./components/Recent.vue'));
Vue.component('side-categories', require('./components/SideCategories.vue'));
Vue.component('side-category', require('./components/SideCategory.vue'));
Vue.component('categories', require('./components/Categories.vue'));
Vue.component('category', require('./components/Category.vue'));
Vue.component('category-posts', require('./components/CategoryPosts.vue'));
Vue.component('search-results', require('./components/SearchResults.vue'));
Vue.component('tags', require('./components/Tags.vue'));
Vue.component('tag', require('./components/Tag.vue'));
Vue.component('comments', require('./components/Comments.vue'));
Vue.component('comment', require('./components/Comment.vue'));



export const eventBus = new Vue();

const store = {

};

const app = new Vue({
    el: '#app'
});

