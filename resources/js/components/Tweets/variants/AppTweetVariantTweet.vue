<template>
    <div class="">
        <div class="flex w-full">

            <img :src="tweet.user.avatar" class="w-12 h-12 mr-3 rounded-full" alt="">

            <div class="flex-grow">
                <app-tweet-username :user="tweet.user" />

                <div v-if="tweet.replying_to" class="text-gray-600 mb-2">
                    Replying to <a href="#">@{{tweet.replying_to}}</a>
                </div>

                <app-tweet-body :tweet="tweet" />

                <div class="flex flex-wrap mb-4 mt-4" v-if="images.length">
                    <div class="w-6/12 flex-grow" v-for="(image, index) in images" :key="index">
                        <img :src="image.url" class="rounded-lg m-1">
                    </div>
                </div>


                <div class="mt-4 mb-4" v-if="video">
                    <video :src="video.url" controls muted class="rounded-lg"></video>
                </div>

                <app-tweet-action-group :tweet="tweet"/>

            </div>
        </div>
    </div>
</template>

<script>

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
        
    },
    
    computed: {
        images() {
            return this.tweet.media.data.filter(m => m.type === 'image')
        },

        video() {
            return this.tweet.media.data.filter(m => m.type === 'video')[0]
        }
    }
}
</script>
