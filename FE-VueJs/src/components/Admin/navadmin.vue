<template>
  <div class="row">
    <div class="header_admin">
      <div class="header_admin_playlist">
        <!-- <button
          class="btn_playlist"
          id="sidebar_collapser"
          onclick="$('body').toggleClass('sidebar-collapse')"
        > -->
        <button class="btn_playlist" id="sidebar_collapser">
          <img class="icons-3" src="../../assets/images/play_list_admin.png" />
        </button>
        <h3 class="admin_title_pages">{{ routeTitle }}</h3>
      </div>
      <div class="admin_tab_menu">
        <ul>
          <li
            data-toggle="tooltip"
            title=""
            data-placement="bottom"
            data-original-title="Tìm kiếm"
          >
            <img src="../../assets/images/hd_item_seacrh.png" alt="" />
          </li>
          <li
            class="bell"
            data-toggle="tooltip"
            title=""
            data-placement="bottom"
            data-original-title="Thông báo"
          >
            <img src="../../assets/images/hd_imtem_infotion.png" alt="" />
            <div class="admin_notification_523"></div>
          </li>
          <li
            data-toggle="tooltip"
            title=""
            data-placement="bottom"
            data-original-title="Hỗ trợ"
          >
            <img src="../../assets/images/hd_item_question.png" alt="" />
          </li>
          <li
            data-toggle="tooltip"
            title=""
            data-placement="bottom"
            data-original-title="Giải đáp"
          >
            <img src="../../assets/images/hd_item_headphonesround.png" alt="" />
          </li>
        </ul>
      </div>
      <div class="admin_account_user">
        <div class="admin_info_user">
          <p
            style="margin-top: 10px; margin-right: 10px"
            class="admin_name_user"
          >
            A la din
          </p>
          <!-- <p class="admin_rank_user">lib1@onepage.shop</p> -->
        </div>
        <div class="admin_avt_user">
          <img
            style="border-radius: 50%; width: 40px"
            src="../../assets/images/04.png"
            alt=""
          />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    routeTitle() {
      const routeName = this.$route.name;
      switch (routeName) {
        case "admin-dashboard":
          return "Dashboard";
        case "admin-products":
          return "Products";
        case "admin-setting":
          return "Setting";
        default:
          return "Dashboard";
      }
    },
  },
};
</script>
<style>
.bell {
  position: relative;
}
.admin_notification_523 {
  position: absolute;
  background-color: #f53e3a;
  border-radius: 50%;
  width: 6px;
  height: 6px;
  top: 0px;
  left: 18px;
}
.header_admin {
  display: flex;
  margin-top: 15px;
}
.btn_playlist {
  border: none;
  background: unset;
  width: 50px;
  margin-top: -10px;
}
.header_admin_playlist {
  display: flex;
}
.header_admin_playlist .admin_title_pages {
  color: #002e60;
  font-size: 24px;
  font-weight: 700;
  line-height: 29px;
  letter-spacing: 0em;
  text-align: left;
  margin-top: 15px;
}
.admin_tab_menu ul {
  display: flex;
  margin-left: 300px;
  text-decoration: none;
}
.admin_tab_menu ul li {
  margin: 10px;
  margin-left: 20px;
  list-style-type: none;
}
.admin_account_user {
  display: flex;
  margin-left: 50px;
}
</style>
