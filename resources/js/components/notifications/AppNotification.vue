<template>
    <div class="text-gray-300 h-60 flex w-full border-b border-gray-800">

        <component :is="`AppNotif${notification.type}`" :notification="notification" />
    	
    </div>
</template>

<script>

export default {
    

	props: {
		notification: {
			required: true,
			type: Object
		}
	}


}
</script>
