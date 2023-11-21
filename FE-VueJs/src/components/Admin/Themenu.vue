<template>
  <ul class="nav flex-column menu_sidebar_523">
    <li class="nav-item">
      <router-link
        :to="{ name: 'admin-dashboard' }"
        class="nav-link"
        :class="{ active: selectedMenuItem === 'dashboard' }"
        @click="selectMenuItem('dashboard')"
      >
        <img
          class="ative_color"
          src="../../assets/images/admin_icon1_active.png"
          alt=""
          v-show="selectedMenuItem === 'dashboard'"
        />
        <img
          class="sidebar-icon"
          src="../../assets/images/admin_icon1_524.png"
          alt=""
          v-show="selectedMenuItem !== 'dashboard'"
        />
        <span class="sidebar-text">Dashboard</span>
      </router-link>
    </li>
    <!-- <li class="nav-item"> <a class="nav-link" href=""> <img class="ative_color" src="../images/admin_icon2_active.png" alt=""><img class="sidebar-icon" src="../images/admin_icon2_524.png" class="d-inline-block align-top" alt=""> <span class="sidebar-text">Category</span></a> </li> -->
    <li class="nav-item">
      <router-link
        :to="{ name: 'admin-menu' }"
        class="nav-link"
        :class="{ active: selectedMenuItem === 'menu' }"
        @click="selectMenuItemMenu('menu')"
      >
        <img
          class="ative_color"
          src="../../assets/images/admin_icon4_active.png"
          alt=""
          v-show="selectedMenuItem === 'menu'"
        />
        <img
          class="sidebar-icon"
          src="../../assets/images/admin_icon4_524.png"
          alt=""
          v-show="selectedMenuItem !== 'menu'"
        />
        <span class="sidebar-text">Menu</span>
      </router-link>
    </li>
    <li class="nav-item menu_coll" :class="{ expanded: isMenu }">
      <router-link
        :to="{ name: 'admin-addmenu' }"
        class="nav-link"
        :class="{ active_child: selectedMenuItemChild === 'addmenu' }"
        @click="selectMenuItemProductsChild('addmenu')"
      >
        <img
          class="ative_color"
          src="../../assets/images/admin_icon3_active.png"
          alt=""
          v-show="selectedMenuItemChild === 'dashboard'"
        />
        <img
          class="sidebar-icon"
          src="../../assets/images/admin_icon3_524.png"
          alt=""
          v-show="selectedMenuItemChild !== 'dashboard'"
        />
        <span class="sidebar-text">Add Menu</span>
      </router-link>
    </li>
    <li class="nav-item">
      <router-link
        :to="{ name: 'admin-products' }"
        class="nav-link"
        :class="{ active: selectedMenuItem === 'products' }"
        @click="selectMenuItemProducts('products')"
      >
        <img
          class="ative_color"
          src="../../assets/images/admin_icon6_active.png"
          alt=""
          v-show="selectedMenuItem === 'products'"
        /><img
          class="sidebar-icon"
          src="../../assets/images/admin_icon6_524.png"
          alt=""
          v-show="selectedMenuItem !== 'products'"
        />
        <span class="sidebar-text">Products</span></router-link
      >
    </li>
    <!-- <div class="menu_coll" :class="{ expanded: isMenuVisible }">
      <ul>
        <li>Option 1</li>
        <li>Option 2</li>
        <li>Option 3</li>
      </ul>
    </div> -->
    <li class="nav-item menu_coll" :class="{ expanded: isProduct }">
      <router-link
        :to="{ name: 'admin-addproduct' }"
        class="nav-link"
        :class="{ active_child: selectedMenuItemChild === 'addproduct' }"
        @click="selectMenuItemProductsChild('addproduct')"
      >
        <img
          class="ative_color"
          src="../../assets/images/admin_icon3_active.png"
          alt=""
          v-show="selectedMenuItemChild === 'addproduct'"
        /><img
          class="sidebar-icon"
          src="../../assets/images/admin_icon3_524.png"
          alt=""
          v-show="selectedMenuItemChild !== 'addproduct'"
        />
        <span class="sidebar-text">Add Product</span></router-link
      >
    </li>
    <li class="nav-item">
      <router-link
        :to="{ name: 'admin-setting' }"
        class="nav-link"
        :class="{ active: selectedMenuItem === 'setting' }"
        @click="selectMenuItem('setting')"
      >
        <img
          class="ative_color"
          src="../../assets/images/admin_icon7_active.png"
          alt=""
          v-show="selectedMenuItem === 'setting'"
        /><img
          class="sidebar-icon"
          src="../../assets/images/admin_icon7_524.png"
          alt=""
          v-show="selectedMenuItem !== 'setting'"
        />
        <span class="sidebar-text">Setting</span></router-link
      >
    </li>
    <li class="nav-item logout" @click="showLogoutModal()">
      <img
        class="ative_color"
        src="../../assets/images/admin_icon8_active.png"
        alt=""
      /><img
        class="sidebar-icon"
        src="../../assets/images/admin_icon8_524.png"
        alt=""
      />
      <span class="sidebar-text">Log Out</span>
    </li>
  </ul>
</template>
<script>
import { useLogoutStore } from "../../store/store.js";
export default {
  data() {
    return {
      selectedMenuItem: "dashboard",
      selectedMenuItemChild: false,
      isProduct: false,
      isMenu: false,
    };
  },
  methods: {
    selectMenuItem(menuitem) {
      this.isProduct = false;
      this.selectedMenuItem = menuitem;
      this.selectedMenuItemChild = false;
      this.isMenu = false;
    },
    toggleItemProduct() {
      this.isProduct = !this.isProduct;
    },
    toggleItemMenu() {
      this.isMenu = !this.isMenu;
    },
    selectMenuItemProducts(menuitem) {
      this.selectedMenuItem = menuitem;
      this.toggleItemProduct();
      this.selectedMenuItemChild = false;
      this.isMenu = false;
    },
    selectMenuItemProductsChild(menuitem) {
      this.selectedMenuItemChild = menuitem;
    },
    selectMenuItemMenu(menuitem) {
      this.selectedMenuItem = menuitem;
      this.toggleItemMenu();
      this.isProduct = false;
    },
    showLogoutModal() {
      useLogoutStore().setShowLogoutModal(true);
    },
  },
};
</script>
<style>
/* .nav {
  box-shadow: 5px 0 10px rgba(0, 0, 0, 0.3);
} */
.menu_coll {
  display: none;
}
.expanded {
  display: block;
  margin-left: 30px;
}
.nav-link.active {
  background-color: #ff5900;
}
.nav-link.active_child {
  background-color: #ff5900;
}
/* @import url(../../admin.css); */
.nav-link {
  border-radius: 40px;
  padding-left: 80px;
  color: #333;
}
.sidebar-text {
  margin-left: 10px;
}
ul li {
  margin: 2px 0;
  /* margin-left: 30px; */
}
.logout {
  margin-left: 50px;
}
</style>
