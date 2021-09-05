<template>
    <div class="p-4 flex-grow">

    	<div class="text-gray-300 mb-4">
    		<app-tweet-username :user="notification.data.user" /> Replid to your tweet
    		<!-- <p class="text-gray-600">{{notification.data.tweet.body}}</p> -->
    		<div>{{notification.id}}</div>
        </div>


        <!-- ACTUAL REPLY COMPONENT -->
    	<app-tweet v-if="resolvedTweet" :tweet="resolvedTweet" class="!border-0" />
    	

    </div>
</template>

<script>
import {mapGetters} from 'vuex'


export default {
    props: {
		notification: {
			required: true,
			type: Object
		}
	},


	computed: {
		...mapGetters({
			tweet: 'notifications/tweet'
		}),


		resolvedTweet () {
			return this.tweet(this.notification.data.tweet.id)
		}
	}
}
</script>
