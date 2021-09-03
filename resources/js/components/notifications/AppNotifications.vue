<template>
    <div class="">
        <div class="text-3xl text-white">Notifications</div>

        <app-notification v-for="notification in notifications" :key="notification.id" :notification="notification" />

        <div v-if="notifications.length" v-observe-visibility="{callback: handleScrolledToBottomOfNotifs}"></div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default {
	data () {
        return {
            page: 1,
            lastPage: 1
        }
    },

    computed: {
        ...mapGetters({
            notifications: 'notifications/notifications'
        }),


        urlwithPage () {
            return `/api/notifications?page=${this.page}`
        }
    },


    methods: {
    	...mapActions({
            getNotifs: 'notifications/getNotifications'
        }),

        loadNotifications () {
            this.getNotifs(this.urlwithPage).then((response) => {
                this.lastPage = response.data.meta.last_page
            })
        },

        handleScrolledToBottomOfNotifs (isVisible) {
            if(!isVisible){
                return
            }

            if(this.lastPage === this.page){
                return
            }

            this.page++
            this.loadNotifications()
        },
    },


    mounted () {
    	this.loadNotifications()
    }
}
</script>
