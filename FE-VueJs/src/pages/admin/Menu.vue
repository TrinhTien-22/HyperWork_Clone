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
      <tr v-for="menu in menus" :key="menu.id" @click="selectMenu(menu)">
        <td scope="row">1</td>
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
      <button class="btn btn-success" type="submit">Update</button>
    </form>
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
      formData.append('image' , this.imagePreview);
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
    }
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
.infor {
  background-color: white;
  z-index: 3;
  position: fixed;
  top: 70px;
  left: 500px;
  width: 35%;
  height: 80%;
  padding-left: 50px;
  padding-top: 40px;
}
.close_infor {
  position: fixed;
  top: 0px;
  left: 0px;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 2;
  width: 100%;
  height: 100%;
}
.button_close_infor {
  margin: 20px 0 0 600px;
}
.main_infor {
  display: flex;
}
.text_name {
  font-size: 20px;
  font-weight: 700;
  line-height: 24px;
  letter-spacing: 0em;
  text-align: left;
  flex-grow: 2;
  margin: 30px 12px;
}
.button_active {
  display: flex;
  background: rgba(255, 89, 0, 1);
  border-radius: 100px;
  padding: 2px;
  width: 64px;
  min-height: 32px;
  cursor: pointer;
  justify-content: space-between;
  align-items: center;
}
.active {
  background-color: white;
}
.buttonclick {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(255, 89, 0, 1);
}
.toggle-container {
            display: flex;
            align-items: center;
        }

        .toggle-label {
            margin-right: 10px;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 34px;
            transition: .4s;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: .4s;
        }

        input:checked + .toggle-slider {
            background-color: #2196F3;
        }

        input:focus + .toggle-slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .toggle-slider:before {
            transform: translateX(26px);
        }
</style>
