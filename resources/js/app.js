require('./bootstrap');
require('alpinejs');

import vue from 'vue'
window.Vue = require('vue').default;

import Vuex from 'vuex'
Vue.use(Vuex)

import VueObserveVisibility from 'vue-observe-visibility'
Vue.use(VueObserveVisibility)

import VModal from 'vue-js-modal'
Vue.use(VModal, {
    dynamic: true,
    injectModalsContainer: true,
    dynamicDefaults: {
        pivotY: 0.1,
        height: 'auto',
        classes: '!bg-gray-800 rounded-lg p-4'
    }
})


Vue.prototype.$user = User

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import timeline from './store/timeline'
import likes from './store/likes'
import retweets from './store/retweets'
import notifications from './store/notifications'
import conversation from './store/conversation'

const store = new Vuex.Store({
    modules: {
        timeline,
        likes,
        retweets,
        notifications,
        conversation
    }
})

const app = new Vue({
    el: '#app',
    store
});


Echo.channel('tweets')
    .listen('.TweetLikesWereUpdated', (e) => {
        if(e.user_id === User.id){
            store.dispatch('likes/syncLike', e.id)
        }

        store.commit('timeline/SET_LIKES', e)
        store.commit('notifications/SET_LIKES', e)
        store.commit('conversation/SET_LIKES', e)

    })
    .listen('.TweetRetweetsWereUpdated', (e) => {
        if(e.user_id === User.id){
            store.dispatch('retweets/syncRetweet', e.id)
        }

        store.commit('timeline/SET_RETWEETS', e)
        store.commit('notifications/SET_RETWEETS', e)
        store.commit('conversation/SET_RETWEETS', e)
    })
    .listen('.TweetWasDeleted', (e) => {
        store.commit('timeline/POP_TWEET', e.id)
    })
    .listen('.TweetRepliesWereUpdated', (e) => {
        store.commit('timeline/SET_REPLIES', e)
        store.commit('notifications/SET_REPLIES', e)
        store.commit('conversation/SET_REPLIES', e)
    })


