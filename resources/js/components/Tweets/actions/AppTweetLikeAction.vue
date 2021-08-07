<template>
    <a href="" class="flex items-center text-base" @click.prevent="likeOrUnlike">

        <svg v-if="liked" id="color" class="fill-current w-5 mr-2" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m11.466 22.776c.141.144.333.224.534.224s.393-.08.534-.224l9.594-9.721c4.001-4.053 1.158-11.055-4.532-11.055-3.417 0-4.985 2.511-5.596 2.98-.614-.471-2.172-2.98-5.596-2.98-5.672 0-8.55 6.984-4.531 11.055z" fill="#f44336"/></svg>

        <svg v-else class="fill-current text-gray-600 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M12.76 3.76a6 6 0 0 1 8.48 8.48l-8.53 8.54a1 1 0 0 1-1.42 0l-8.53-8.54a6 6 0 0 1 8.48-8.48l.76.75.76-.75zm7.07 7.07a4 4 0 1 0-5.66-5.66l-1.46 1.47a1 1 0 0 1-1.42 0L9.83 5.17a4 4 0 1 0-5.66 5.66L12 18.66l7.83-7.83z"/></svg>

        <span :class="{'text-red-600': liked}" class="text-gray-600">{{tweet.likes_count}} </span>

    </a>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    data () {
        return {}
    },

    props: {
        tweet: {
            required: true,
            type: Object
        }
    },

    methods: {
        ...mapActions({
            likeTweet: 'likes/likeTweet',
            unlikeTweet: 'likes/unlikeTweet',
        }),

        likeOrUnlike () {
            if (this.liked){
                this.unlikeTweet(this.tweet)
                return
            }

            this.likeTweet(this.tweet)
        }
    },

    computed: {
        ...mapGetters({
            likes: 'likes/likes'
        }),

        liked () {
            return this.likes.includes(this.tweet.id)
        }
    },
    
    mounted() {
        
    }
}
</script>
