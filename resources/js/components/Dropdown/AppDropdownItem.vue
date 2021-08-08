<template>
    <a href="#" class="block py-3 px-4 text-gray-300 hover:bg-gray-600" @click.prevent="handleClick">
        <slot />
    </a>
</template>

<script>

export default {
    data () {
        return {}
    },


    methods: {
        handleClick (e) {
            this.$emit('click', e)
            this.$parent.close()
        }
    },
    
}
</script>
