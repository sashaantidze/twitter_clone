<template>
    <div class="">
    	<app-tweet-retweet-compose @success="$emit('close')" :tweet="tweet" />

        <component
        class="border border-gray-700 rounded-lg mt-4 p-4"
        v-if="tweet"
        :is="`app-tweet-variant-${tweet.type}`"
        :tweet="tweet">
        </component>
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

}
</script>
