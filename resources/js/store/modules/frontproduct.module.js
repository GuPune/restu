
import { FrontProductService } from "@services/frontproduct.service";
import {
    FETCH_TYPERES,FETCH_RES,FETCH_TOE_FRONT,FETCH_RES_CART,GET_CART,CHECKOUT,UPDATE_CART,GET_ORDER_TOE,GET_TOKEN,CALL_STAFF,GET_ORDER_TOE_AND_CHECKBILL,PAYMENT,OPENTOE,FETCH_TYPERES_GROUP,DEL_CART,FETCT_PRICE,CANCEL_ORDER
} from "@store/actions.type";
import {
    SET_TYPE_LIST,SET_TOE_FRONT,SET_ADD_REST,SET_GET_CART,SET_UPDATE_CART,SET_CHECKOUT,SET_TOKEN,SET_STATUS_CHECKBILL,SET_DEL_CART,SET_CANCEL_CART
} from "@store/mutations.type";



const state = {
    token: null,
    status:'Y',
    ordertype: [],
    res:[],
    toe:null,
    cartTotal: 0,
    cartALLPrice: null,
    cart: [],
    formcheckout: {
        token:null
    },
};
const getters = {
    token(state) {
        return state.token;
    },
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
    },
    cartALLPrice(state){
        return state.cartALLPrice;
    },
    status(state){
        return state.status;
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

    async [CHECKOUT](context,payload) {


      const { data } = await FrontProductService.checkout(state.cart);
      var check = {};
      check["token"] = payload;
      check["order_number"] = data;
      const { order } = await FrontProductService.checktoken(check);

     context.commit(SET_CHECKOUT);
        //  return data;
      },
    async [UPDATE_CART](context,payload) {

          context.commit(SET_UPDATE_CART,payload);
          //  return data;
    },

    async [DEL_CART](context,payload) {

        context.commit(SET_DEL_CART,payload);
        //  return data;
  },
  async [FETCT_PRICE](context) {
    context.commit(SET_GET_CART);
    //  return data;
},

async [CANCEL_ORDER](context) {
    context.commit(SET_CANCEL_CART);
    //  return data;
},



    async [GET_ORDER_TOE](context,payload) {
        const { data } = await FrontProductService.getordertoe(payload);
       // context.commit(SET_UPDATE_CART,payload);
         return data;
     },

     async [GET_ORDER_TOE_AND_CHECKBILL](context,payload) {
        const { data } = await FrontProductService.getordercheckbill(payload);
       // context.commit(SET_UPDATE_CART,payload);
         return data;
     },
    async [GET_TOKEN](context,payload) {

const { data } = await FrontProductService.gettoken(payload);
   context.commit(SET_TOKEN,payload);
     return data;
    },
    async [CALL_STAFF](context,payload) {


    const { data } = await FrontProductService.call(payload);
    //      context.commit(SET_TOKEN,payload);

    },

    async [PAYMENT](context,payload) {
        const { data } = await FrontProductService.checkbill(payload);
         context.commit(SET_STATUS_CHECKBILL);
        },

    async [FETCH_TYPERES_GROUP](context,payload) {
            const { data } = await FrontProductService.gettypegroup(payload);

            return data;

    },












};

const mutations = {
    [SET_TOKEN](state, data) {

        state.token = data.token;

    },
    [SET_TYPE_LIST](state, data) {
        state.ordertype = data;
    },
    [SET_TOE_FRONT](state, data) {
        state.toe = data;
        console.log('state.toe',data);

    },
    [SET_CHECKOUT](state) {
        state.cartALLPrice = 0;
        state.cartTotal = 0;
        state.cart = [];
        localStorage.removeItem("cart");
    },
    [SET_CANCEL_CART](state) {
        state.cartALLPrice = 0;
        state.cartTotal = 0;
        state.cart = [];
        localStorage.removeItem("cart");
    },



    [SET_GET_CART](state) {
        this.cart = JSON.parse(localStorage.getItem("cart"));
        if(!this.cart){
            this.cart = [];
        }
        state.cartALLPrice = 0;
        state.cartTotal = this.cart.length;
        state.cart = this.cart;

        for(let i = 0; i < state.cart.length; i++){
            console.log(i);
            state.cartALLPrice += state.cart[i].total_res;
          }


        //   state.cart.forEach(function(item) {
        //     sum += item.total_res;
        //     console.log(sum);
        //  });
        console.log(state.cartALLPrice);
      //  state.cartALLPrice = 0;


    },

    [SET_DEL_CART](state,item){



        const idxObj = state.cart.findIndex(object => {
            return object.id === item.id;
          });
          let x = state.cart.splice(idxObj, 1);
          state.cartALLPrice = 0;

        //  let found = state.cart.find(product => product.id == item.id);
         let a = localStorage.setItem("cart", JSON.stringify(state.cart));
         for(let i = 0; i < state.cart.length; i++){
          state.cartALLPrice += state.cart[i].total_res;
        }

state.cartTotal = this.cart.length;

    },

    [SET_UPDATE_CART](state,item){

        let found = state.cart.find(product => product.id == item.id);
        state.cartALLPrice = 0;

        if (found) {

            var total = parseInt(item.qty) * parseInt(item.price_sell);
            found.qty = item.qty;
            found.total_res = total;
            found.note = item.note;
           } else {

           }
           let a = localStorage.setItem("cart", JSON.stringify(state.cart));
           for(let i = 0; i < state.cart.length; i++){
            state.cartALLPrice += state.cart[i].total_res;
          }
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
    [SET_STATUS_CHECKBILL](state,item){
        state.status = 'O';
    }

};

export default {
    state,
    getters,
    actions,
    mutations
};
