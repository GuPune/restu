
import { FrontProductService } from "@services/frontproduct.service";
import {
    FETCH_TYPERES
} from "@store/actions.type";
import {
    SET_TYPE_LIST
} from "@store/mutations.type";



const state = {
    ordertype: [],
};
const getters = {
    ordertype(state) {
        return state.ordertype;
    },

};


const actions = {
    async [FETCH_TYPERES](context) {
        const { data } = await FrontProductService.gettypelist();
        return data;
    },


};

const mutations = {
    [SET_TYPE_LIST](state, data) {
        state.ordertype = data;
    },


};

export default {
    state,
    getters,
    actions,
    mutations
};
