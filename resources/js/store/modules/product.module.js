
import { ProductService } from "@services/product.service";
import {
    FETCH_PRODUCT
} from "@store/actions.type";
import {
    SET_PRODUCT
} from "@store/mutations.type";



const state = {
    product: [],
};
const getters = {
    product(state) {
        return state.product;
    }

};


const actions = {
    async [FETCH_PRODUCT](context) {
        const { data } = await ProductService.get();

         context.commit(SET_PRODUCT, data.data);
        return data;
    },
};

const mutations = {
    [SET_PRODUCT](state, data) {
        state.product = data;
    },
};

export default {
    state,
    getters,
    actions,
    mutations
};
