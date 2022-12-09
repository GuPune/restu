
import { ProductService } from "@services/product.service";
import {
    FETCH_PRODUCT,FETCH_TYPEPRODUCT,FETCH_PRODUCT_FITTER,ADD_PRODUCT,UPDATE_ORDER,FETCH_ORDER,DELTLE_ORDER,FETCH_DISCOUNT,FETCH_TOE,FETCH_ORDER_CUS,UPDATE_ORDER_PENDING,UPDATE_ORDER_WAIT,UPDATE_ORDER_DOING,OPENTOE,CANCELTOE
} from "@store/actions.type";
import {
    SET_PRODUCT,SET_ORDERS,SET_UPDATEORDERS,SET_ORDERS_TOE,SET_ORDERS_TOTAL,SET_ORDERS_DELETE,SET_DISCOUNT,SET_TOE_ID,SET_TOE_STATUS,SET_TOE_STATUS_OPEN,SET_TOE_STATUS_CANCEL
} from "@store/mutations.type";



const state = {
    product: [],
    toe_id: 0,
    typeres:[],
    orders:[],
    orders_total:[],
    discount:0,
    typediscount:1,
    ToeStatus:null,
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
    },
    toe_id(state) {
        return state.toe_id;
    },
    ToeStatus(state) {
        return state.ToeStatus;
    },
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
    async [FETCH_TOE](context) {
        const { data } = await ProductService.gettoe();
        return data;
    },


    async [ADD_PRODUCT](context,payload) {

        const { data } = await ProductService.save(payload);

        if(data.data == "success"){
            Vue.set(payload, 'order_id', data.datas);
            context.commit(SET_ORDERS,payload);
            context.commit(SET_ORDERS_TOTAL);
          //  context.commit(SET_TOE_ID);
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

        context.commit(SET_ORDERS_TOE, data.data);
        context.commit(SET_ORDERS_TOTAL);
        context.commit(SET_TOE_ID,payload);
        context.commit(SET_TOE_STATUS,data.status);
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


    async [FETCH_ORDER_CUS](context,payload) {
        const { data } = await ProductService.orderscus(payload);

        return data;
        },

    async [UPDATE_ORDER_PENDING](context,payload) {
            const { data } = await ProductService.orderupdate_pen(payload);
            return data;
    },
    async [UPDATE_ORDER_WAIT](context,payload) {
        const { data } = await ProductService.orderupdate_wait(payload);
        return data;
    },
    async [UPDATE_ORDER_DOING](context,payload) {
    const { data } = await ProductService.orderupdate_doing(payload);
    return data;
    },

    async [OPENTOE](context,payload) {
        const { data } = await ProductService.opentoe(payload);

        await context.commit(SET_TOE_STATUS_OPEN);
    },

    async [CANCELTOE](context,payload) {
     const { data } = await ProductService.canceltoe(payload);

      await context.commit(SET_TOE_STATUS_CANCEL);
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


    },
    [SET_TOE_STATUS](state, item) {
        state.ToeStatus = item;
        console.log('state.ToeStatus',item);
    },

    [SET_TOE_STATUS_OPEN](state, item) {
        state.ToeStatus = "notidle";
    },

    [SET_TOE_STATUS_CANCEL](state, item) {
        state.ToeStatus = "idle";
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
    [SET_TOE_ID](state,item) {
      //  console.log('SET_TOE_ID',item.toe_id);
        state.toe_id = item.toe_id;
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
