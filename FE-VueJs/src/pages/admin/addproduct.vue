<template>
  <navadmin></navadmin>
  <div class="row addproductrow">
    <div class="addproduct">
      <form
        class="formaddproduct"
        action=""
        method="post"
        @submit.prevent="addProducts"
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
            v-model="product.name"
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
            ref="imageInput2"
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
            v-model="product.description"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="number"
            name="price"
            id=""
            class="form-control"
            placeholder="Price"
            aria-describedby="helpId"
            v-model="product.price"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <input
            type="number"
            name="saleof"
            id=""
            class="form-control"
            placeholder="Sale Of"
            aria-describedby="helpId"
            v-model="product.saleof"
          />
        </div>
        <div class="form-group">
          <label for=""></label>
          <select
            class="form-control"
            v-model="product.menu_id"
            name="menu_id"
            id=""
          >
            <option value="" default selected>Menu</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </div>
        <div class="form-group">
          <label for=""></label>
          <select
            class="form-control"
            v-model="product.active"
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
          <button class="btn btn-info" type="submit">ADD</button>
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
      product: {
        name: "",
        image: null,
        description: "",
        price: "",
        saleof: "",
        menu_id: "",
        active: "",
      },
    };
  },

  methods: {
    // nameimage(event) {
    //   // this.product.image = event.target.files[0];
    //   const input = this.$refs.imageInput2;
    //   if (input && input.files && input.files.length > 0) {
    //     this.menuData.image = input.files[0];
    //     console.log(this.menuData.image);
    //   } else {
    //     console.error("Files not found.");
    //   }
    // },
    nameimage(event) {
      const input = event.target;
      if (input.files.length > 0) {
        this.product.image = input.files[0];
      }
    },
    addProducts() {
      const formData = new FormData();
      const accessToken = localStorage.getItem("access_token");
      formData.append("name", this.product.name);
      formData.append("image", this.product.image);
      formData.append("description", this.product.description);
      formData.append("price", this.product.price);
      formData.append("saleof", this.product.saleof);
      formData.append("menu_id", this.product.menu_id);
      formData.append("active", this.product.active);
      axios
        .post("http://127.0.0.1:8000/api/admin/products/add", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            Authorization: "Bearer " + accessToken,
          },
        })
        .then((response) => {
          console.log(response);
          this.$router.push({ name: "admin-products" });
        })
        .catch((error) => {
          console.log(error);
        });
    },
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
