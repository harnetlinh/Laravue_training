import Vue from 'vue';
import Router from 'vue-router';

// We could use sub-router as separated file
import nestedRouter from './modules/nested';
import errorRouter from './modules/error';

// in development-env not use lazy-loading, because lazy-loading too many pages will cause webpack hot update too slow. so only in production use lazy-loading;
// detail: https://panjiachen.github.io/vue-element-admin-site/#/lazy-loading

Vue.use(Router);

/* Layout */
import Layout from '../views/layout/Layout';

/**
* hidden: true                   if `hidden:true` will not show in the sidebar(default is false)
* alwaysShow: true               if set true, will always show the root menu, whatever its child routes length
*                                if not set alwaysShow, only more than one route under the children
*                                it will becomes nested mode, otherwise not show the root menu
* redirect: noredirect           if `redirect:noredirect` will no redirect in the breadcrumb
* name:'router-name'             the name is used by <keep-alive> (must set!!!)
* meta : {
    title: 'title'               the name show in submenu and breadcrumb (recommend set)
    icon: 'svg-name'             the icon show in the sidebar
    breadcrumb: false            if false, the item will hidden in breadcrumb(default is true)
  }
**/
export const constantRouterMap = [
  {
    path: '/redirect',
    component: Layout,
    hidden: true,
    children: [
      {
        path: '/redirect/:path*',
        component: require('@/views/redirect/index'),
      },
    ],
  },
  {
    path: '/login',
    component: require('@/views/login/index').default,
    hidden: true,
  },
  {
    path: '/auth-redirect',
    component: require('@/views/login/AuthRedirect').default,
    hidden: true,
  },
  {
    path: '/404',
    redirect: { name: 'Page 404' },
    component: require('@/views/ErrorPage/404').default,
  },
  {
    path: '/401',
    component: require('@/views/ErrorPage/401').default,
  },
  {
    path: '',
    component: Layout,
    redirect: 'dashboard',
    meta: {
      title: 'Dashboard',
    },
    children: [
      {
        path: 'dashboard',
        component: require('@/views/dashboard/index').default,
        name: 'Dashboard',
        meta: { title: 'Dashboard', icon: 'dashboard', noCache: true },
      },
    ],
  },
  {
    path: '/store',
    component: Layout,
    redirect: '/store/list',
    name: 'Store',
    meta: {
      title: 'Store',
      icon: 'international',
    },
    children: [
      {
        path: 'create',
        component: require('@/views/Store/Create/index').default,
        name: 'CreateStore',
        meta: { title: 'Create Store' },
      },
      {
        path: 'management',
        component: require('@/views/Store/Management/index').default,
        name: 'ManagementStore',
        meta: { title: 'Management Store' },
      }
    ],
  },
  {
    path: '/product',
    component: Layout,
    redirect: '/product/list',
    name: 'Product',
    meta: {
      title: 'Product',
      icon: 'shopping'
    },
    children: [
      {
        path: 'create',
        component: require('@/views/Product/Create/index').default,
        name: 'CreateProduct',
        meta: {
          title: 'Create Product'
        }
      },
      {
        path: 'management',
        component: require('@/views/Product/Management/index').default,
        name: 'ManagementProduct',
        meta: {
          title: 'Management Product'
        }
      }
    ]
  },
  errorRouter,
  {
    path: '*',
    redirect: { name: 'Page404' }
  }
];

export default new Router({
  // mode: 'history', // Require service support
  scrollBehavior: () => ({ y: 0 }),
  routes: constantRouterMap,
});

export const asyncRouterMap = [
];
