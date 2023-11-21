import { createRouter, createWebHistory } from "vue-router";
import admin from "./admin.js";

const routes = [...admin];
// const router = createRouter({
//   history: createWebHistory(),
//   routes,
// });
const isAuthenticated = () => {
  // Kiểm tra xem accessToken có tồn tại trong localStorage hay không
  const accessToken = localStorage.getItem("access_token");
  return accessToken !== null;
};

export const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Middleware kiểm tra đăng nhập
router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !isAuthenticated()) {
    // Nếu truy cập route yêu cầu đăng nhập mà chưa đăng nhập, chuyển hướng đến trang đăng nhập
    next({ name: "admin-login" });
  } else {
    // Nếu đã đăng nhập hoặc route không yêu cầu đăng nhập, cho phép truy cập bình thường
    next();
  }
});
export default router;
