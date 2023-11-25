<template>
  <navadmin></navadmin>
  <Search></Search>
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Active</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(menu , index) in menus" :key="menu.id" @click="selectMenu(menu)">
        <td scope="row">{{ index + 1 }}</td>
        <td>{{ menu.name }}</td>
        <td>
          <img
            style="width: 50px; border-radius: 10px"
            :src="menu.image"
            alt="Menu Image"
          />
        </td>
        <td>{{ menu.description }}</td>
        <td>{{ menu.active }}</td>
      </tr>
    </tbody>
  </table>
  <div class="close_infor" v-if="selectedMenu" @click="closeDetails()">
    <img
      class="button_close_infor"
      src="../../assets/images/close_popup_admin.png"
      alt=""
    />
  </div>
  <div class="infor" v-if="selectedMenu">
    <form @submit.prevent="updateMenu" action="" method="post">
      <div class="main_infor">
        <img
          style="width: 60px; border-radius: 35%"
          :src="imagePreview || selectedMenu.image"
          alt="Menu Image"
        />
        <!-- <p class="text_name">{{ selectedMenu.name }}</p> -->
        <input class="text_name" name="update_name" type="text" v-model="selectedMenu.name" />
      </div>
      <input type="file"  @input="previewImage"/>
      <br /><br />
      <p>
        <strong>Description:</strong>
        <input type="text" name="update_description" v-model="selectedMenu.description" />
      </p>
      <p><strong>Create At:</strong> {{ selectedMenu.created_at }}</p>
      <p><strong>Update:</strong> {{ selectedMenu.updated_at }}</p>
      <p style="display: flex;">
        <strong>Active:</strong>
        <div class="toggle-container">
            <label class="toggle-switch">
                <input style="margin-left: 7px;" type="checkbox" :checked="selectedMenu.active === 'Yes'" v-model="selectedMenu.active">
                <span class="toggle-slider"></span>
            </label>
        </div>
        <input name="update_active" type="text" style="display: none;" :value="selectedMenu.active ? 'Yes' : 'No'">
      </p>
      <button class="button_update" type="submit">Update</button>
    </form>
    <form action="" method="post" @submit.prevent="confirmDeleteMenu">
      <button class="button_delete" type="submit">Delete</button>
    </form>
    <div class="confirm_delete_menu" v-if="contentConfirmDeleteMenu" >
      <div class="close_popup_delete_menu" @click="confirmDeleteMenu" >
          <img
            class="img_close_menu"
            src="../../assets/images/close_lg.png"
            alt=""
            @click="closeConfirm()"
          />
      </div>
      <div class="content_confirm_menu">
        <p style="text-align: center;">Are You sure You want to <strong>Delete it ?</strong></p>
        <button class="sure_delete_menu" @click="deletemenu">Sure</button>
        <button class="not_sure_menu" @click="confirmDeleteMenu">Cancel</button>
      </div>
    </div>
  </div>
</template>
<script>
import navadmin from "../../components/Admin/navadmin.vue";
import Search from "../../components/Admin/Search.vue";

export default {
  data() {
    return {
      selectedMenu: null,
      menus: [],
      imagePreview: null,
      imgupdate :null,
      contentConfirmDeleteMenu:false,
    };
  },
  components: {
    navadmin: navadmin,
    Search: Search,
  },
  mounted() {
    this.getMenu();
  },
  methods: {
    getMenu() {
      const accessToken = localStorage.getItem("access_token");

      if (!accessToken) {
        console.error("Access token not found");
        return;
      }

      axios
        .get("http://127.0.0.1:8000/api/admin/menu/get", {
          headers: {
            Authorization: "Bearer " + accessToken,
          },
        })
        .then((response) => {
          this.menus = response.data.menu;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    selectMenu(menu) {
      this.selectedMenu = menu;
    },
    closeDetails() {
      this.selectedMenu = null;
      this.imagePreview = null;
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
    updateMenu(){
      const formData  = new FormData();
      formData.append('name' , this.selectedMenu.name);
      formData.append('description' , this.selectedMenu.description);
      formData.append('image' , this.imgupdate);
      formData.append('active' , this.selectedMenu.active);
      console.log(formData.image);
      const accessToken = localStorage.getItem('access_token');
      axios.post(`http://127.0.0.1:8000/api/admin/menu/update/${this.selectedMenu.id}`, formData, {
        headers: {
            "Content-Type": "multipart/form-data",
            Authorization: "Bearer " + accessToken,
        },
      })
      .then((response)=>{
        console.log(response.data);
        this.closeDetails();
        this.getMenu();
      })
      .catch((error)=>{
        console.log(error)
      })
    },
    deletemenu(){
      const accessToken = localStorage.getItem('access_token');

      axios.delete(`http://127.0.0.1:8000/api/admin/menu/delete/${this.selectedMenu.id}`,{
        headers:{
          Authorization: "Bearer " + accessToken,
        },
      })
      .then((response)=>{
        console.log(response.data);
        this.confirmDeleteMenu();
        this.closeDetails();
        this.getMenu();
      })
      .catch((error)=>{
        console.log(error);
      })
    },
    confirmDeleteMenu(){
      this.contentConfirmDeleteMenu = !this.contentConfirmDeleteMenu;
    }
  },
};
</script>
<style>
@import url("../../assets/css/admin/menu.css");
</style>
