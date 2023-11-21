<template>
  <!-- <div class="row">
    <div class="navbar">
      <h3 style="color: #002e60">DashBoard</h3>
    </div>
  </div> -->
  <navadmin></navadmin>
  <div class="">
    <div class="dashboard_overview_revenue">
      <div class="dashboard_revenue_content">
        <div class="dashboard_header">
          <h3 class="dashboard_title">Revenue</h3>
          <div class="admin_search">
            <input type="search" placeholder="Search shop name" />
            <button class="admin_btn_search">
              <img src="../../assets/images/seacrh_admin_523.png" alt="" />
            </button>
          </div>
        </div>
        <div class="dashboard_overview_flex">
          <div class="dashboard_revenue_revenune">
            <img src="../../assets/images/dashboard_03.png" alt="" />
            <p class="dashboard_num">200,000</p>
            <p class="dashboard_text">Completed Orders</p>
          </div>
          <div class="dashboard_revenue_service">
            <img src="../../assets/images/dashboard_04.png" alt="" />
            <p class="dashboard_num">10,000,000</p>
            <p class="dashboard_text">Buyers</p>
          </div>
          <div class="dashboard_revenue_shipping">
            <img src="../../assets/images/dashboard_05.png" alt="" />
            <p class="dashboard_num">10,000,000</p>
            <p class="dashboard_text">Buyers</p>
          </div>
        </div>
      </div>
      <div class="dashboard_overview_content">
        <div class="dashboard_header">
          <h3 class="dashboard_title">Overview</h3>
        </div>
        <div class="dashboard_overview_flex">
          <div class="dashboard_overview_completed">
            <img src="../../assets/images/dashboard_01.png" alt="" />
            <p class="dashboard_num">200,000</p>
            <p class="dashboard_text">Completed Orders</p>
          </div>
          <div class="dashboard_overview_buyers">
            <img src="../../assets/images/dashboard_02.png" alt="" />
            <p class="dashboard_num">10,000,000</p>
            <p class="dashboard_text">Buyers</p>
          </div>
        </div>
      </div>
    </div>
    <div class="order_analysis">
      <div class="dashboard_header">
        <h3 class="dashboard_title">Order Analysis</h3>
      </div>
      <div class="order_analysis_02">
        <div class="box_order_02">
          <img src="../../assets/images/dashboard_06.png" alt="" />
          <div>
            <p class="dashboard_text">Total Orders</p>
            <p class="dashboard_num">200,000,000</p>
          </div>
        </div>
        <div class="box_order_02">
          <img src="../../assets/images/dashboard_07.png" alt="" />
          <div>
            <p class="dashboard_text">Sold Products</p>
            <p class="dashboard_num">850,000,000</p>
          </div>
        </div>
      </div>
      <div class="order_analysis_03">
        <div class="box_order_03">
          <img src="../../assets/images/dashboard_08.png" alt="" />
          <div>
            <p class="dashboard_text">Completed Orders</p>
            <p class="dashboard_num">500,000</p>
          </div>
        </div>
        <div class="box_order_03">
          <img src="../../assets/images/dashboard_09.png" alt="" />
          <div>
            <p class="dashboard_text">Cancelled</p>
            <p class="dashboard_num">500</p>
          </div>
        </div>
        <div class="box_order_03">
          <img src="../../assets/images/dashboard_10.png" alt="" />
          <div>
            <p class="dashboard_text">Refunded Orders</p>
            <p class="dashboard_num">750</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import navadmin from "../../components/Admin/navadmin.vue";
export default {
  components: {
    navadmin: navadmin,
  },
};
</script>
<style>
@import url(../../assets/css/admin/dashboard.css);
</style>
