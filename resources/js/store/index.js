import {createStore} from "vuex";

export default createStore({
    state() {
        return {
            carData: null,
        }
    },

    getters: {
        getCarData(state) {
            return state.carData;
        }
    }
})
