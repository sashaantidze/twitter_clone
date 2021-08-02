<template>
    <div class="">
        <span class="text-gray-300 font-bold">{{user.name}}</span>&nbsp;<span class="text-gray-600">@{{user.username}}</span>
        
    </div>
</template>

<script>

export default {
    props: {
        user: {
        	required: true,
        	type: Object
        }
    },

    methods: {
        
    },
    
    mounted() {
        
    }
}
</script>
