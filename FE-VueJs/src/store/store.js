// store.js
import { defineStore } from "pinia";

export const useLogoutStore = defineStore("logout", {
  state: () => ({
    showLogoutModal: false,
  }),
  actions: {
    setShowLogoutModal(value) {
      this.showLogoutModal = value;
    },
  },
});
