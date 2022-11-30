const routes = [
    {
      path: '/app/order/list/:token',
      component: () => import('../pages/Home.vue'),
      name: '/',
    },
    {
        path: '/app/restlist/:token/:id',
        component: () => import('../pages/ResList.vue'),
        name: 'listres'
      },
    {
      path: '/about',
      component: () => import('../pages/About.vue'),
      name: 'about'
    },
    {
        path: '/app/orderbuy/:token',
        component: () => import('../pages/OrderBuy.vue'),
        name: 'orderbuy'
      },
      {
        path: '/app/callstaff/:token',
        component: () => import('../pages/CallStaff.vue'),
        name: 'callstaff'
      },
      {
        path: '/app/paymoney/:token',
        component: () => import('../pages/Pay.vue'),
        name: 'paymoney'
      },
      {
        path: '/app/checkout/:token',
        component: () => import('../pages/CheckOut.vue'),
        name: 'checkout'
      },
  ]



  export default routes;



