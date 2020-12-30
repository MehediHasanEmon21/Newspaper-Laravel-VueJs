<template>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"
          ><i class="fas fa-bars"></i
        ></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer"
            >See All Notifications</a
          >
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <img
            src="/admin/images/default_avatar.png"
            style="height: 30px; width: 32px; margin-right: 6px; opacity: 0.8"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
          />{{ admin.name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Account Setting</span>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item">
            <i class="fas fa-user mr-2"></i> View Profile
          </a>

          <div class="dropdown-divider"></div>
          <a
            @click.prevent="adminLogout()"
            style="cursor: pointer"
            class="dropdown-item"
          >
            <i class="fas fa-lock mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "AdminHeader",
  data() {
    return {};
  },
  methods: {
    adminLogout() {
      axios
        .post(
          "/api/admin/logout?token=" +
            localStorage.getItem("admin_access_token")
        )
        .then((result) => {
          localStorage.removeItem("admin_access_token");
          Toast.fire({
            icon: "success",
            title: "Logged Out successfully",
          });
          this.$router.push({ name: "AdminLogin" });
        })
        .catch((err) => {});
    },
    getAuthAdmin() {
      this.$store.dispatch("admin/getAdmin");
    },
  },
  created() {
    this.getAuthAdmin();
  },
  computed: {
    admin() {
      return this.$store.getters["admin/getAdmin"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
