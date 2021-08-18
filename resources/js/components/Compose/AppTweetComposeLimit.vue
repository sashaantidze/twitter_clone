<template>

    <div class="h-10 w-10 relative">

    	<svg class="transform -rotate-90" viewBox="0 0 120 120">
		  <circle cx="60" cy="60" :r="radius" stroke-width="8" fill="none" class="stroke-current text-gray-600" />

		  <circle
		  cx="60" 
		  cy="60"
		  :r="radius"
		  stroke-width="9"
		  fill="none"
		  class="stroke-current"
		  :stroke-dasharray="dash"
		  :stroke-dashoffset="offset"
          :class="{
            'text-red-600': percentageIsOver,
            'text-blue-500': !percentageIsOver
          }" />
    
		</svg>


    </div>


</template>

<script>

export default {

    props: {
        body: {
            required: true,
            type: String
        }
    },

    data () {
        return {
        	radius: 40
        }
    },


    methods: {
        
    },
    
    computed: {
        dash () {
        	return 2 * Math.PI * this.radius
        },


        percentageIsOver () {
            return this.percentage > 100
        },

        percentage () {
            return Math.round((this.body.length * 100) / 280)
        },

        displayPercentage() {
            return this.percentage <= 100 ? this.percentage : 100
        },

        offset () {
        	let circ = this.dash
        	let progress = this.displayPercentage / 100

        	return circ * (1 - progress)
        }
    }
}
</script>
