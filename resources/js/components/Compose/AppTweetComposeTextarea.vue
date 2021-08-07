<template>
    <div class="">
        <textarea class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2" placeholder="What's cracking, my dude?" autofocus @input="$emit('input', $event.target.value); resize($event)" :value="value"></textarea>
    </div>
</template>

<script>

export default {
    data () {
        return {}
    },

    props: {
        value: {
        	required: false
        }
    },

    methods: {
        resize (e) {
        	e.target.style.height = 'auto'
        	e.target.style.height = `${e.target.scrollHeight}px`
        }
    },
    
    mounted() {
        
    }
}
</script>
