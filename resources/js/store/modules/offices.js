export default {
    state: {
        offices: [],
        item: null
    },

    actions: {
        /**
         *
         * @param commit
         * @param state
         * @param params
         * @returns {Promise<boolean|*>}
         */
        async create({commit, state}, params) {

            try {
                let response = await axios.post('/api/office', params)
                console.log(response.data);
                return response.data
            }
             catch (e) {
                return false
            }
        },

        /**
         *
         * @param commit
         * @param state
         * @returns {Promise<boolean>}
         */
        async getAll({commit, state}) {

            try {
                let response = await axios.get('/api/office')
                commit('SET_ITEMS', response.data.data)

                return true
            }
            catch (e) {
                return false
            }
        },

        /**
         *
         * @param commit
         * @param state
         * @param id
         * @returns {Promise<boolean|any>}
         */
        async remove({commit, state}, id) {

            try {
                let response = await axios.delete(`/api/office/${id}`)
                return response.data
            } catch (e) {
                return false
            }

        },

        /**
         *
         * @param commit
         * @param state
         * @param params
         * @returns {Promise<boolean|any>}
         */
        async update({commit, state}, params) {

            try {
                let response = await axios.put(`/api/office/${params.id}`, params)
                return response.data
            } catch (e) {
                return false
            }
        }
    },

    mutations: {
        SET_ITEMS(state, data) {
            state.offices = data
        }
    },

    getters: {
        getOffices(state) {
            return state.offices
        }
    }
}
