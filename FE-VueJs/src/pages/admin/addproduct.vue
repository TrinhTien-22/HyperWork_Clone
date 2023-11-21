<template>
  <navadmin></navadmin>
  <div class="row addproductrow">
    <div class="addproduct">
      <form class="formaddproduct" action="" method="post">
        <div class="text-center">
          <h3>Add Menu</h3>
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="text"
            name=""
            id=""
            class="form-control"
            placeholder="Name"
            aria-describedby="helpId"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="file"
            name=""
            id=""
            class="form-control"
            placeholder="Image Menu"
            aria-describedby="helpId"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="text"
            name=""
            id=""
            class="form-control"
            placeholder="Description"
            aria-describedby="helpId"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="text"
            name=""
            id=""
            class="form-control"
            placeholder="Price"
            aria-describedby="helpId"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <select class="form-control" name="" id="">
            <option value="" default selected>Menu</option>
            <option value="">1</option>
            <option value="">2</option>
          </select>
        </div>
        <div class="form-group">
          <label for=""></label>
          <select class="form-control" name="" id="">
            <option value="" default selected>Active</option>
            <option value="">Yes</option>
            <option value="">No</option>
          </select>
        </div>
        <br />
        <div class="text-center">
          <button class="btn btn-info">ADD</button>
        </div>
        <br />
      </form>
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
.addproductrow {
  display: flex;
}
.addproduct {
  width: 50%;
  margin-left: 200px;
  border: 1px solid rgb(107, 106, 106);
  border-radius: 5px;
}
.formaddproduct {
  margin-left: 70px;
  width: 70%;
}
</style>
