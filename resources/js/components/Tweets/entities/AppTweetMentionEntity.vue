<template>

	<a :href="`/users/${body}`" class="text-blue-300">{{body}}</a>

</template>

<script>
	export default {
		props: {
			body: {
				required: true,
				Type: Object
			}
		}
	}
</script>