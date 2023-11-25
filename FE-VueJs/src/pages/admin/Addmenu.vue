<template>
  <navadmin></navadmin>
  <div class="row addmenurow">
    <div class="addmenu">
      <form
        @submit.prevent="addMenu"
        class="formaddmenu"
        action=""
        method="post"
        enctype="multipart/form-data"
      >
        <div class="text-center">
          <h3>Add Menu</h3>
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="text"
            name="name"
            id=""
            class="form-control"
            placeholder="Name"
            aria-describedby="helpId"
            v-model="menuData.name"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="file"
            name="image"
            id=""
            class="form-control"
            placeholder="Image Menu"
            aria-describedby="helpId"
            @change="nameimage"
            ref="imageInput"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="text"
            name="description"
            id=""
            class="form-control"
            placeholder="Description"
            aria-describedby="helpId"
            v-model="menuData.description"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <select
            v-model="menuData.active"
            class="form-control"
            name="active"
            id=""
          >
            <option value="" default selected>Active</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
        <br />
        <div class="text-center">
          <button type="submit" class="btn btn-info">ADD</button>
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
  data() {
    return {
      menuData: {
        name: "",
        image: null,
        description: "",
        active: "",
      },
    };
  },
  methods: {
    nameimage(event) {
      const input = this.$refs.imageInput;
      if (input && input.files && input.files.length > 0) {
        this.menuData.image = input.files[0];
        console.log(this.menuData.image);
      } else {
        console.error("Files not found.");
      }
      // this.menuData.image = event.target.files[0];
    },
    addMenu() {
      const accessToken = localStorage.getItem("access_token");

      if (!accessToken) {
        console.error("Access token not found");
        return;
      }
      const formData = new FormData();
      formData.append("name", this.menuData.name);
      formData.append("description", this.menuData.description);
      formData.append("image", this.menuData.image);
      formData.append("active", this.menuData.active);

      axios
        .post("http://127.0.0.1:8000/api/admin/menu/add", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            Authorization: "Bearer " + accessToken,
          },
        })
        .then((response) => {
          console.log(response.data);
          this.$router.push({ name: "admin-menu" });
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },
};
</script>
<style>
.addmenurow {
  display: flex;
}
.addmenu {
  width: 50%;
  margin-left: 200px;
  border: 1px solid rgb(107, 106, 106);
  border-radius: 5px;
}
.formaddmenu {
  margin-left: 70px;
  width: 70%;
}
</style>
