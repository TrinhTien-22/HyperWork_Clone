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
        <th>Saleof</th>
        <th>Description</th>
        <th>Active</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(product, index) in products" @click="selectedProduct(product)">
        <td scope="row">{{ index + 1 }}</td>
        <td>{{ product.menu_id }}</td>
        <td>{{ product.name }}</td>
        <td>
          <img
            style="width: 50px; border-radius: 10px"
            :src="product.image"
            alt=""
          />
        </td>
        <td>${{ product.price }}</td>
        <td>{{ product.saleof }}%</td>
        <td>{{ product.description }}</td>
        <td>{{ product.active }}</td>
      </tr>
    </tbody>
  </table>
  <div class="close_infor" v-if="Productselect" @click="closeDetails()">
    <img
      class="button_close_infor"
      src="../../assets/images/close_popup_admin.png"
      alt=""
    />
  </div>
  <div class="infor" v-if="Productselect">
    <form  action="" @submit.prevent="updateProduct" method="post">
      <div class="main_infor">
        <img
          style="width: 60px; border-radius: 35%"
          :src="imagePreview || Productselect.image"
          alt="Menu Image"
        />
        <!-- <p class="text_name">{{ selectedMenu.name }}</p> -->
        <input class="text_name" name="update_name" type="text" v-model="Productselect.name" />
      </div>
      <input type="file"  @input="previewImage"/>
      <br /><br />
      <p>
        <strong>Menu:</strong>
        <select name="update_menuid" id="" v-model="Productselect.menu_id">
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </p>
      <p>
        <strong>Description:</strong>
        <input type="text" name="update_description" v-model="Productselect.description" />
      </p>
      <p>
        <strong>Price:</strong>
        <input type="number" name="update_price" v-model="Productselect.price" />
      </p>
      <p>
        <strong>Saleof:</strong>
        <input type="number" name="update_saleof" v-model="Productselect.saleof" />
      </p>
      <p><strong>Create At:</strong> {{ Productselect.created_at }}</p>
      <p><strong>Update:</strong> {{ Productselect.updated_at }}</p>
      <p style="display: flex;">
        <strong>Active:</strong>
        <div class="toggle-container">
            <label class="toggle-switch">
                <input style="margin-left: 7px;" type="checkbox" :checked="Productselect.active === 'Yes'" v-model="Productselect.active">
                <span class="toggle-slider"></span>
            </label>
        </div>
        <input name="update_active" type="text" style="display: none;" :value="Productselect.active ? 'Yes' : 'No'">
      </p>
      <button class="button_update" type="submit">Save</button>
    </form>
    <form action="" method="post" @submit.prevent="confirmDelete">
      <button class="button_delete" type="submit">Delete</button>
    </form>
    <div class="confirm_delete" v-if="contentConfirmDelete" >
      <div class="close_popup_delete" @click="confirmDelete" >
          <img
            class="img_close"
            src="../../assets/images/close_lg.png"
            alt=""
            @click="closeConfirm()"
          />
      </div>
      <div class="content_confirm">
        <p style="text-align: center;">Are You sure You want to <strong>Delete it ?</strong></p>
        <button class="sure_delete" @click="deleteproduct">Sure</button>
        <button class="not_sure" @click="confirmDelete">Cancel</button>
      </div>
    </div>
  </div>
</template>
<script>
import navadmin from "../../components/Admin/navadmin.vue";
import Search from "../../components/Admin/Search.vue";
export default {
  components: {
    navadmin: navadmin,
    Search: Search,
  },
  data() {
    return {
      products: null,
      Productselect : null,
      imagePreview: null,
      imgupdate : null,
      contentConfirmDelete : false,
    };
  },
  mounted() {
    this.getproducts();
  },
  methods: {

    getproducts() {
      const accessToken = localStorage.getItem("access_token");
      axios
        .get("http://127.0.0.1:8000/api/admin/products/get", {
          headers: {
            Authorization: "Bearer " + accessToken,
          },
        })
        .then((response) => {
          this.products = response.data.products;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    selectedProduct(product){
      this.Productselect = product;
    },
    previewImage(event) {
      const input = event.target;
      if (input.files && input.files[0]) {
        this.imgupdate = input.files[0];
        const reader = new FileReader();
        reader.onload = (e) => {
          this.imagePreview = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
      this.selectedMenu.image = event.target.files[0];
    },
    closeDetails(){
      this.Productselect = null;
      this.imagePreview = null;
    },
    updateProduct(){
      const accessToken = localStorage.getItem('access_token');
      const formData = new FormData();
      formData.append('name' , this.Productselect.name);
      formData.append('image' , this.imgupdate);
      formData.append('price' , this.Productselect.price);
      formData.append('description' , this.Productselect.description);
      formData.append('saleof' , this.Productselect.saleof);
      formData.append('active' , this.Productselect.active);
      formData.append('menu_id' , this.Productselect.menu_id);
      axios.post(`http://127.0.0.1:8000/api/admin/products/update/${this.Productselect.id}` , formData , {
        headers:{
          "Content-Type": "multipart/form-data",
            Authorization: "Bearer " + accessToken,
        },
      })
      .then((response)=>{
        console.log(response);
        this.closeDetails();
        this.getproducts();
      })
      .catch((error)=>{
        console.log(error);
      })
    },
    deleteproduct(){
      const accessToken = localStorage.getItem('access_token');
      axios.delete(`http://127.0.0.1:8000/api/admin/products/delete/${this.Productselect.id}` , {
        headers:{
          Authorization: "Bearer " + accessToken,
        }
      })
      .then((response)=>{
        console.log(response.data);
        this.confirmDelete();
        this.closeDetails();
        this.getproducts();
      })
      .catch((error)=>{
        console.log(error);
      })
    },
    confirmDelete(){
      this.contentConfirmDelete = !this.contentConfirmDelete;
    }
  },
};
</script>
<style>
@import url("../../assets/css/admin/products.css");
</style>
