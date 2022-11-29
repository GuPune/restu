const routes = [
    {
      path: '/app/order/list/:token',
      component: () => import('../pages/Home.vue'),
      name: '/',
    },
    {
        path: '/restlist/:token/:id',
        component: () => import('../pages/ResList.vue'),
        name: 'listres'
      },
    {
      path: '/about',
      component: () => import('../pages/About.vue'),
      name: 'about'
    },
    {
        path: '/orderbuy/:token',
        component: () => import('../pages/OrderBuy.vue'),
        name: 'orderbuy'
      },
      {
        path: '/callstaff/:token',
        component: () => import('../pages/CallStaff.vue'),
        name: 'callstaff'
      },
      {
        path: '/paymoney/:token',
        component: () => import('../pages/Pay.vue'),
        name: 'paymoney'
      },
      {
        path: '/checkout/:token',
        component: () => import('../pages/CheckOut.vue'),
        name: 'checkout'
      },
  ]



  export default routes;



