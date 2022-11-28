
import { FrontProductService } from "@services/frontproduct.service";
import {
    FETCH_TYPERES,FETCH_RES,FETCH_TOE_FRONT,FETCH_RES_CART
} from "@store/actions.type";
import {
    SET_TYPE_LIST,SET_TOE_FRONT,SET_ADD_REST
} from "@store/mutations.type";



const state = {
    ordertype: [],
    res:[],
    toe:null,
    cartTotal: 1,
    cart: [],
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
    cart(state){
        return state.cart;
    },
    cartTotal(state){
        return state.cartTotal;
    }

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
    async [FETCH_RES_CART](context,payload) {
      //  const { data } = await FrontProductService.gettoe(payload);


        context.commit(SET_ADD_REST,payload);
      //  return data;
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


    [SET_ADD_REST](state,item){

      console.log('item',item);
        let found = state.cart.find(product => product.id == item.id);


        if (found) {
            console.log('found.qty',found.qty);
            console.log('item.qty',item.qty);
         var bbbb = parseInt(found.qty) + parseInt(item.qty);
     // Vue.set(item, 'qty', bbbb);

console.log('bbbb',bbbb);
        } else {
         state.cart.push(item);

            // Vue.set(item, 'quantity', 1);
let total = item.price_sell * item.qty;
console.log('total',total);
         //   Vue.set(item, 'totalPrice', item.price_sell);
            // state.cartTotal++;
        }
    let a = localStorage.setItem("cart", JSON.stringify(state.cart));

    },


};

export default {
    state,
    getters,
    actions,
    mutations
};
