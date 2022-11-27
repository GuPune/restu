const routes = [
    {
      path: '/app/order/list/:id',
      component: () => import('../pages/Home.vue'),
      name: '/',
      children : [
        { path: '/detail/:id',
        component: () => import('../pages/ResList.vue'),
        name: 'listres' },
    ]
    },
    {
      path: '/about',
      component: () => import('../pages/About.vue'),
      name: 'about'
    },
    {
        path: '/orderbuy',
        component: () => import('../pages/OrderBuy.vue'),
        name: 'orderbuy'
      },
      {
        path: '/callstaff',
        component: () => import('../pages/CallStaff.vue'),
        name: 'callstaff'
      },
      {
        path: '/paymoney',
        component: () => import('../pages/Pay.vue'),
        name: 'paymoney'
      },
  ]



  export default routes;



