const admin = [
  {
    path: "/admin",
    component: () => import("../layouts/admin.vue"),
    children: [
      {
        path: "dashboard",
        name: "admin-dashboard",
        component: () => import("../pages/admin/dashboard.vue"),
        meta: { requiresAuth: true },
      },
      {
        path: "setting",
        name: "admin-setting",
        component: () => import("../pages/admin/setting.vue"),
        meta: { requiresAuth: true },
      },
      {
        path: "products",
        name: "admin-products",
        component: () => import("../pages/admin/products.vue"),
        meta: { requiresAuth: true },
      },
      {
        path: "addproduct",
        name: "admin-addproduct",
        component: () => import("../pages/admin/addproduct.vue"),
        meta: { requiresAuth: true },
      },
      {
        path: "menu",
        name: "admin-menu",
        component: () => import("../pages/admin/Menu.vue"),
      },
      {
        path: "addmenu",
        name: "admin-addmenu",
        component: () => import("../pages/admin/addmenu.vue"),
        meta: { requiresAuth: true },
      },
    ],
  },
  {
    path: "/admin/login",
    name: "admin-login",
    component: () => import("../layouts/loginadmin.vue"),
  },
];
export default admin;
