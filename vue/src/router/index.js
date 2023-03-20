import {createRouter, createWebHistory} from "vue-router";
import Home from "../views/dashboard/Home.vue";
import Artists from "../views/dashboard/Artists.vue";
import Albums from "../views/dashboard/Albums.vue";
import Songs from "../views/dashboard/Songs.vue";
import Login from "../views/auth/Login.vue";
import Register from "../views/auth/Register.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthLayout from "../components/AuthLayout.vue";
import store from "../store/index.js";
import Favorites from "../views/dashboard/Favorites.vue";

const routes = [
  {
    path: '/',
    redirect: '/home',
    component: DefaultLayout,
    meta: {requiresAuth: true},
    children: [
      {path: '/home', name: 'Home', component: Home},
      {path: '/artists', name: 'Artists', component: Artists},
      {path: '/albums', name: 'Albums', component: Albums},
      {path: '/songs', name: 'Songs', component: Songs},
      {path: '/favorites', name: 'Favorites', component: Favorites},
    ]
  },
  {
    path: '/auth',
    redirect: '/login',
    name: 'Auth',
    component: AuthLayout,
    meta: {isGuest: true},
    children: [
      {path: '/login', name: 'Login', component: Login},
      {path: '/register', name: 'Register', component: Register}
    ]
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.user.token) {
    next({name: 'Login'})
  } else if (store.state.user.token && (to.meta.isGuest)) {
    next({name: 'Home'});
  } else {
    next();
  }
})

export default router;