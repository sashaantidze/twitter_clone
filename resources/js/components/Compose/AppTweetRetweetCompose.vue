<template>
    <form class="flex" @submit.prevent="submit">
        
    	
		<img :src="$user.avatar" class="w-12 h-12 mr-3 rounded-full" alt="">
    		

    	<div class="flex-grow">

    		<app-tweet-compose-textarea :placeholder="`Add a comment`" v-model="form.body" />

    		<div class="flex justify-between">


    			<ul class="flex items-center">
                    
    			</ul>


    			<div class="flex items-center justify-end">
                    <div>
                        <app-tweet-compose-limit class="mr-2" :body="form.body" />
                    </div>
                    
    				<button type="submit" class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none">Retweet</button>
    			</div>

    		</div>

    	</div>
    </form>
</template>


<script>
import compose from '../../mixins/compose'
import axios from 'axios'

export default {
    mixins: [
        compose
    ],


    methods: {
        async post(){
            
        }
    }
}
</script>
