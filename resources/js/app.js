require('./bootstrap');
require('alpinejs');

import vue from 'vue'
window.Vue = require('vue').default;

import Vuex from 'vuex'
Vue.use(Vuex)

import VueObserveVisibility from 'vue-observe-visibility'
Vue.use(VueObserveVisibility)

Vue.prototype.$user = User

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import timeline from './store/timeline'

const store = new Vuex.Store({
    modules: {
        timeline
    }
})

const app = new Vue({
    el: '#app',
    store
});


