<template>
  <navadmin></navadmin>
  <Search></Search>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Id</th>
        <th>Menu</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Description</th>
        <th>Active</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">1</td>
        <td>1</td>
        <td>Iphone 15</td>
        <td>Img</td>
        <td>$13000</td>
        <td>OK</td>
        <td>YES</td>
      </tr>
      <tr>
        <td scope="row">2</td>
        <td>2</td>
        <td>Iphone 15 ProMax 1Tb</td>
        <td>Img</td>
        <td>$15000</td>
        <td>OK</td>
        <td>YES</td>
      </tr>
    </tbody>
  </table>
</template>
<script>
import navadmin from "../../components/Admin/navadmin.vue";
import Search from "../../components/Admin/Search.vue";
export default {
  components: {
    navadmin: navadmin,
    Search: Search,
  },
};
</script>
<style>
.table thead tr th:first-child {
  border-radius: 10px 0 0 0;
}
.table thead tr th:last-child {
  border-radius: 0 10px 0 0;
}
.table thead tr th {
  padding: 15px;
}
.table tbody tr td {
  padding: 15px;
}
</style>
