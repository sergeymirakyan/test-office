import Vue from 'vue'
import Vuex from 'vuex'
import offices from "./modules/offices"
import locations from "./modules/locations"

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        offices,
        locations
    }
})
