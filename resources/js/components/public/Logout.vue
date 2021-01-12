<template>
  <div></div>
</template>

<script>
export default {
  name: "Logout",
  created() {
    localStorage.removeItem("user_data");
    localStorage.removeItem("user_access_token");
    Toast.fire({
      icon: "success",
      title: "Logged Out successfully",
    });
    this.getUser();
    this.$router.push({ name: "Login" });
  },
  methods: {
    getUser() {
      this.$store.dispatch("user/getUser");
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
