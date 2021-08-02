<template>
    <div class="container">
        <app-tweet v-for="tweet in tweets" :key="tweet.id" :tweet="tweet" />
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    methods: {
        ...mapActions({
            getTweets: 'timeline/getTweets'
        })
    },

    computed: {
        ...mapGetters({
            tweets: 'timeline/tweets'
        })
    },

    mounted () {
        this.getTweets()
    }
}
</script>
