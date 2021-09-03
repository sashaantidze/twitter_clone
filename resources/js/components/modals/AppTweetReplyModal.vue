<template>
    <div class="">
    	<component
        class="p-4"
        v-if="tweet"
        :is="`app-tweet-variant-${tweet.type}`"
        :tweet="tweet">
        </component>


        <app-tweet-reply-compose 
        v-if="tweet"
        :tweet="tweet"
        @success="$emit('close')"
        />

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
