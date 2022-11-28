
import { FrontProductService } from "@services/frontproduct.service";
import {
    FETCH_TYPERES,FETCH_RES,FETCH_TOE_FRONT
} from "@store/actions.type";
import {
    SET_TYPE_LIST,SET_TOE_FRONT
} from "@store/mutations.type";



const state = {
    ordertype: [],
    res:[],
    toe:null
};
const getters = {
    ordertype(state) {
        return state.ordertype;
    },
    res(state) {
        return state.res;
    },
    toe(state) {
        return state.toe;
    },

};


const actions = {
    async [FETCH_TYPERES](context,payload) {

        const { data } = await FrontProductService.gettypelist(payload);
        return data;
    },
    async [FETCH_RES](context,payload) {
        const { data } = await FrontProductService.getres(payload);
        return data;
    },
    async [FETCH_TOE_FRONT](context,payload) {

        const { data } = await FrontProductService.gettoe(payload);
        context.commit(SET_TOE_FRONT, data);
        return data;
    },
};

const mutations = {
    [SET_TYPE_LIST](state, data) {
        state.ordertype = data;
    },
    [SET_TOE_FRONT](state, data) {
        state.toe = data;
        console.log('state.toe',data);

    },


};

export default {
    state,
    getters,
    actions,
    mutations
};
