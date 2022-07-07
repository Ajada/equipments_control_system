import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "../views/HomeView.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
    children: [
      {
        path: "/:id/action",
        name: "action_home",
        component: () => import("@/components/layouts/home/ActionHomeView.vue"),
      },
      {
        path: "/:id/data",
        name: "data_home",
        component: () => import("@/components/layouts/home/DataHomeView.vue"),
      },
      {
        path: "/:id/historic",
        name: "historic_home",
        component: () =>
          import("@/components/layouts/home/HistoricHomeView.vue"),
      },
    ],
  },
  {
    path: "/inventory",
    name: "inventory",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/InventoryView.vue"),
  },
  {
    path: "/user",
    name: "user",
    component: () =>
      import(/* webpackChunkName: "user" */ "../views/UsersView.vue"),
  },
  {
    path: "/settings",
    name: "settings",
    component: () =>
      import(/* webpackChunkName: "settings" */ "../views/SettingsView.vue"),
  },
];

const router = new VueRouter({
  mode: "history",
  linkActiveClass: "Active",
  base: process.env.BASE_URL,
  routes,
});

export default router;
