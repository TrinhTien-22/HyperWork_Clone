<template>
  <div class="container-fluid">
    <!-- <div class="row">
      <div class="bg-success p-3" style="display: flex">
        <img style="max-width: 35px" src="../assets/icon/admin.jpg" alt="" />
        <div style="margin-left: 20px; margin-top: 5px">Admin</div>
      </div>
    </div>
    <br /> -->
    <div class="row" style="height: 100vh">
      <div class="col-sm-3 menu" style="height: 100%">
        <a-list class="menulist" bordered :data-source="data">
          <template #renderItem="{ item }">
            <a-list-item>{{ item }}</a-list-item>
          </template>
          <template #header>
            <div class="logo_menu_admin">
              <img src="../assets/images/nt_sp_dau_tay.png" alt="" />
            </div>
          </template>

          <Themenu></Themenu>
        </a-list>
      </div>
      <div class="col-sm-9 content">
        <router-view> </router-view>
      </div>
      <div :class="{ 'coating ': showModal }">
        <div class="close_popup_admin">
          <img
            class="action_close"
            src="../assets/images/close_popup_admin.png"
            alt=""
            @click="confirmLogoutFalse()"
          />
        </div>
        <div class="logoutconfirm" v-if="showModal">
          <p style="text-align: center" class="text_log_out">
            Do you want to <strong> logout</strong> ?
          </p>
          <button class="savelogout" @click="confirmLogout(true)">Save</button>
          <button class="cancellogout" @click="confirmLogoutFalse()">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Themenu from "../components/Admin/Themenu.vue";
import "../style.css";
import { ref, watch } from "vue";
import { useLogoutStore } from "../store/store.js";
export default {
  data() {
    return {
      showModal: false,
    };
  },
  components: {
    Themenu: Themenu,
  },
  created() {
    const store = useLogoutStore();

    watch(
      () => store.showLogoutModal,
      (value) => {
        this.showModal = value;
      }
    );
  },
  methods: {
    confirmLogout(confirmed) {
      axios
        .post("http://127.0.0.1:8000/api/admin/logout")
        .then((response) => {
          localStorage.removeItem("access_token");
          this.$router.push("/admin/login");
        })
        .catch((error) => {
          console.error("Đã xảy ra lỗi khi đăng xuất:", error);
        });
      useLogoutStore().setShowLogoutModal(false);
    },
    confirmLogoutFalse() {
      useLogoutStore().setShowLogoutModal(false);
    },
  },
};
</script>
<style>
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333;
}
:root {
  --transition_duration: 0.1s;
  --collapse_sidebar_width: 80px;
  --sidebar_width: 314px;
  --primary-dark: rgb(16, 62, 103);
  --topbar-height: 0px;
}
.logo_menu_admin {
  display: flex;
  justify-content: center;
}
.menulist {
  width: 22%;
  height: 100%;
  box-shadow: 5px 0 10px rgba(0, 0, 0, 0.3);
  position: fixed;
}

.logoutconfirm {
  position: absolute;
  padding: 40px;
  z-index: 3;
  top: 300px;
  left: 470px;
  background-color: white;
  border-radius: 10px;
}
.content {
  position: relative;
  z-index: 1;
}
.close_popup_admin {
  margin-left: 630px;
  margin-top: 250px;
}
.coating {
  position: fixed;
  width: 100%;
  height: 100%;
  z-index: 2;
  background-color: rgba(0, 0, 0, 0.6);
}
.savelogout {
  background-color: rgba(255, 89, 0, 1);
  color: white;
  font-weight: 600;
  padding: 10px 50px 10px 50px;
  border-radius: 5px;
  border: none;
  margin: 10px;
}
.cancellogout {
  background-color: rgb(230, 233, 235);
  color: black;
  font-weight: 600;
  padding: 10px 50px 10px 50px;
  border-radius: 5px;
  border: none;
  margin: 10px;
}
</style>
