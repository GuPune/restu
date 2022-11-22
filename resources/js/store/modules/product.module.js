
import { ProductService } from "@services/product.service";
import {
    FETCH_PRODUCT,FETCH_TYPEPRODUCT,FETCH_PRODUCT_FITTER,ADD_PRODUCT,UPDATE_ORDER,FETCH_ORDER
} from "@store/actions.type";
import {
    SET_PRODUCT,SET_ORDERS,SET_UPDATEORDERS,SET_ORDERS_TOE
} from "@store/mutations.type";



const state = {
    product: [],
    typeres:[],
    orders:[],
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
        console.log(data);

        if(data == "success"){
            context.commit(SET_ORDERS,payload);
        }else {
            alert('ok');

        }

    },

    async [UPDATE_ORDER](context,payload) {
        const { data } = await ProductService.updateorder(payload);
       context.commit(SET_UPDATEORDERS,payload);
           },
    async [FETCH_ORDER](context,payload) {
        const { data } = await ProductService.getorder(payload);
        context.commit(SET_ORDERS_TOE, data);
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
            found.quantity == item.quantity;
            found.totalPrice = found.quantity * found.price_sell;
          } else {



          }

    },
    [SET_ORDERS_TOE](state, item) {

        state.orders = item;
        console.log(state.orders)

    },
};

export default {
    state,
    getters,
    actions,
    mutations
};
