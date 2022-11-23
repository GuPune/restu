
import { ProductService } from "@services/product.service";
import {
    FETCH_PRODUCT,FETCH_TYPEPRODUCT,FETCH_PRODUCT_FITTER,ADD_PRODUCT,UPDATE_ORDER,FETCH_ORDER,DELTLE_ORDER,FETCH_DISCOUNT
} from "@store/actions.type";
import {
    SET_PRODUCT,SET_ORDERS,SET_UPDATEORDERS,SET_ORDERS_TOE,SET_ORDERS_TOTAL,SET_ORDERS_DELETE,SET_DISCOUNT
} from "@store/mutations.type";



const state = {
    product: [],
    typeres:[],
    orders:[],
    orders_total:[],
    discount:0,
    typediscount:1,
    total:{
        list:null,
        pricetotal:null,
        quantity:null,
        pricediscount:null,
    }
};
const getters = {
    product(state) {
        return state.product;
    },
    typeres(state) {
        return state.typeres;
    },
    orders(state) {
        return state.orders;
    },
    orders_total(state) {
        return state.orders_total;
    },
    total(state) {
        return state.total;
    }


};


const actions = {
    async [FETCH_PRODUCT](context) {
        const { data } = await ProductService.get();
         context.commit(SET_PRODUCT, data);

        return data;
    },
    async [FETCH_TYPEPRODUCT](context) {
        const { data } = await ProductService.gettyperes();

       //  context.commit(SET_PRODUCT, data.data);
        return data;
    },
    async [FETCH_PRODUCT_FITTER](context,payload) {
        const { data } = await ProductService.gettyperesfitter(payload);
       context.commit(SET_PRODUCT, data);
        return data;
    },

    async [ADD_PRODUCT](context,payload) {

        const { data } = await ProductService.save(payload);

        if(data.data == "success"){
            Vue.set(payload, 'order_id', data.datas);
            context.commit(SET_ORDERS,payload);
            context.commit(SET_ORDERS_TOTAL);
        }else {
            alert('ok');

        }

    },

    async [UPDATE_ORDER](context,payload) {
        const { data } = await ProductService.updateorder(payload);
        context.commit(SET_UPDATEORDERS,payload);
        context.commit(SET_ORDERS_TOTAL);
           },
    async [FETCH_ORDER](context,payload) {

        const { data } = await ProductService.getorder(payload);
        context.commit(SET_ORDERS_TOE, data);

        context.commit(SET_ORDERS_TOTAL);
    },

    async [DELTLE_ORDER](context,payload) {
        const { data } = await ProductService.delorder(payload);

        await context.commit(SET_ORDERS_DELETE,payload);
          await context.commit(SET_ORDERS_TOTAL);
     //   context.commit(SET_ORDERS_TOTAL);
    },

    async [FETCH_DISCOUNT](context,payload) {

context.commit(SET_DISCOUNT,payload);
    },


};

const mutations = {
    [SET_PRODUCT](state, data) {
        state.product = data;
    },
    [SET_ORDERS](state, item) {
      //  let found = state.orders.find(product => product.id == item.id);
      let found = state.orders.find(product => product.id == item.id);
      if (found) {
        found.quantity ++;
        found.totalPrice = found.quantity * found.price_sell;
      } else {
          state.orders.push(item);
          Vue.set(item, 'quantity', 1);
          Vue.set(item, 'totalPrice', item.price_sell);


      }


    },
    [SET_UPDATEORDERS](state, item) {


        let found = state.orders.find(product => product.id == item.id);
        if (found) {
            found.quantity = item.quantity;
            found.totalPrice = found.quantity * found.price_sell;
          } else {



          }



    },
    [SET_ORDERS_TOE](state, item) {
        state.orders = item;
        console.log('SET_ORDERS_TOE',state.orders)
    },
    [SET_ORDERS_TOTAL](state, item) {
        state.total.list = 0;
        state.total.pricetotal = 0;
        state.total.quantity = 0;
        state.total.list = state.orders.length;
        state.orders.forEach(val => {
         state.total.pricetotal += Number(val.totalPrice);
         state.total.quantity += Number(val.quantity);
        });
        state.total.pricediscount = state.total.pricetotal - state.discount;



    },
    [SET_ORDERS_DELETE](state,item) {
       let i = state.orders.map(item => item.id).indexOf(item.key) // find index of your object
       state.orders.splice(i, 1) // remove it from array
    },
    [SET_DISCOUNT](state,item) {


        state.total.list = 0;
        state.total.pricetotal = 0;
        state.total.quantity = 0;
        state.total.list = state.orders.length;
        state.discount = item.discount;
        state.orders.forEach(val => {
         state.total.pricetotal += Number(val.totalPrice);
         state.total.quantity += Number(val.quantity);
        });
        state.total.pricediscount = state.total.pricetotal - state.discount;

        console.log('SET_DISCOUNT',state.total);
        if(0 > state.total.pricediscount){

            state.total.pricediscount = 0;
        }

     },



};

export default {
    state,
    getters,
    actions,
    mutations
};
