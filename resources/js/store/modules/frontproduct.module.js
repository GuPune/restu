
import { FrontProductService } from "@services/frontproduct.service";
import {
    FETCH_TYPERES,FETCH_RES,FETCH_TOE_FRONT,FETCH_RES_CART,GET_CART
} from "@store/actions.type";
import {
    SET_TYPE_LIST,SET_TOE_FRONT,SET_ADD_REST,SET_GET_CART
} from "@store/mutations.type";



const state = {
    ordertype: [],
    res:[],
    toe:null,
    cartTotal: 0,
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
    async [GET_CART](context) {
        //  const { data } = await FrontProductService.gettoe(payload);
          context.commit(SET_GET_CART);
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
    [SET_GET_CART](state) {

        this.cart = JSON.parse(localStorage.getItem("cart"));
        state.cartTotal = this.cart.length;


    },
    [SET_ADD_REST](state,item){

      console.log('item',item);
    let found = state.cart.find(product => product.id == item.id);
     //   state.cart.push(item);

     console.log('found',found);
  //  let a = localStorage.setItem("cart", JSON.stringify(state.cart));







if (found) {
    var bbbb = parseInt(found.qty) + parseInt(item.qty);
    var total = bbbb * parseInt(item.price_sell);
    found.qty = bbbb;
    found.total_res = total;
    console.log('found total',total);
    console.log('found if',found);
   } else {
    var obj = {};
    obj["id"] = item.id;
    obj["name_list"] = item.name_list;
    obj["price_sell"] = item.price_sell;
    obj["qty"] = item.qty;
    obj["note"] = item.note;
    obj["total_res"] = parseInt(item.qty) * parseInt(item.price_sell);
    state.cart.push(obj);
   }
   let a = localStorage.setItem("cart", JSON.stringify(state.cart));

   this.cart = JSON.parse(localStorage.getItem("cart"));
   state.cartTotal = this.cart.length;

    },


};

export default {
    state,
    getters,
    actions,
    mutations
};
