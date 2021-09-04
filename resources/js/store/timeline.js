import axios from 'axios'
import {get} from 'lodash'
import getters from './tweet/getters.js'
import mutations from './tweet/mutations.js'
import actions from './tweet/actions.js'

export default {
	namespaced: true,

	state: {
		tweets: []
	},

	getters,
	mutations,
	actions
}