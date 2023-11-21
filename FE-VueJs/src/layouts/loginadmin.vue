<template>
  <div class="row">
    <div class="log_in_admin back_ground_FF5900">
      <!-- <div class="log_in_images">
        <img src="../images/admin_login_523.png" alt="" />
        <h3 class="title_login_left color_FFF">Welcome to our website</h3>
      </div> -->
      <div class="log_in_content">
        <form action="" class="form_login_admin" @submit.prevent="submitForm()">
          <div class="header_login">
            <img
              class="logo_admin"
              src="../assets/images/nt_sp_dau_tay.png"
              alt=""
            />
            <h3 class="title_fom_login">LOGIN</h3>
          </div>
          <div class="input_form_admin">
            <label for="">Email<span class="color_FF5900">*</span></label>
            <div class="admin_input_box">
              <img src="../assets/images/admin_email_523.png" alt="" />
              <input
                name="email"
                v-model="email"
                type="text"
                placeholder="Your email"
              />
            </div>
          </div>
          <div class="input_form_admin">
            <label for="">Password<span class="color_FF5900">*</span></label>
            <div class="admin_input_box">
              <img src="../assets/images/admin_password_523.png" alt="" />
              <input
                name="password"
                class="inptut_password"
                placeholder="Password"
                v-bind:type="showPassword ? 'text' : 'password'"
                v-model="password"
              />
              <div class="admin_show_hide" @click="showPass()">
                <img
                  class="nt_show_pass"
                  src="../assets/images/admin_show_pass_523.png"
                  alt=""
                  style=""
                  v-show="!showPassword"
                />
                <img
                  class="nt_hide_pass"
                  src="../assets/images/admin_hide_pass523.png"
                  alt=""
                  style="display: none"
                  v-show="showPassword"
                />
              </div>
            </div>
          </div>
          <div class="admin_remember">
            <div class="admin_remember_account">
              <input
                type="checkbox"
                id="customCheckbox"
                class="custom-checkbox"
              />
              <span class="checkmark"></span>
              <label class="check">Remember my account </label>
            </div>
            <a href="#" class="link_forgot_password">Forgot password?</a>
          </div>
          <button type="submit" class="admin_btn_form">Login</button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      showPassword: false,
      email: "",
      password: "",
    };
  },
  methods: {
    submitForm() {
      const formData = {
        email: this.email,
        password: this.password,
      };
      axios
        .post("http://127.0.0.1:8000/api/admin/login", formData)
        .then((response) => {
          const accessToken = response.data.token;
          localStorage.setItem("access_token", accessToken);

          // router.push({ path: "/admin/dashboard" });
          this.$router.push({ name: "admin-dashboard" });
        })
        .catch((error) => {
          console.error("Đăng nhập không thành công:", error);
        });
    },
    showPass() {
      this.showPassword = !this.showPassword;
    },
  },
};
</script>

<style>
@import url("../assets/css/admin/login.css");
</style>
