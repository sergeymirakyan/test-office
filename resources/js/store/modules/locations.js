export default {
    state: {
        locations: [],
        item: null
    },

    actions: {
        /**
         *
         * @param commit
         * @param state
         * @returns {Promise<boolean>}
         */
        async getAllLocations({commit, state}) {

            try {
                let response = await axios.get('/api/location')
                commit('SET_LOCATIONS', response.data.data)

                return true
            }
            catch (e) {
                return false
            }
        }
    },

    mutations: {
        SET_LOCATIONS(state, data) {
            state.locations = data
        }
    },

    getters: {
        getLocations(state) {
            return state.locations
        }
    }
}
