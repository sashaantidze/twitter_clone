<template>
    <div class="container">
        <div class="border-b-8 border-gray-800 p-4">
            <app-tweet-compose/>
        </div>

        <app-tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet" />

        <div v-if="tweets.length" v-observe-visibility="{callback: handleScrolledToBottomOfTimeline}"></div>
    </div>

    
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    data () {
        return {
            page: 1,
            lastPage: 1
        }
    },

    methods: {
        ...mapActions({
            getTweets: 'timeline/getTweets'
        }),

        loadTweets () {
            this.getTweets(this.urlwithPage).then((response) => {
                this.lastPage = response.data.meta.last_page
            })
        },

        handleScrolledToBottomOfTimeline (isVisible) {
            if(!isVisible){
                return
            }

            if(this.lastPage === this.page){
                console.log('last page')
                return
            }

            this.page++
            this.loadTweets()
        },

    },

    computed: {
        ...mapGetters({
            tweets: 'timeline/tweets'
        }),


        urlwithPage () {
            return `/api/timeline?page=${this.page}`
        }
    },

    mounted () {
        this.loadTweets()
    }
}
</script>
