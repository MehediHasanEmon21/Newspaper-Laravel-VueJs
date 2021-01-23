<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <router-link :to="{ name: 'AdminDashboard' }" class="brand-link">
      <img
        src="dist/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </router-link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            src="/admin/images/default_avatar.png"
            class="img-circle elevation-2"
            alt="User Image"
          />
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ parsing_admin.name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'AdminDashboard' }" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'BreakingPost' }" class="nav-link">
              <i class="nav-icon fas fa-business-time"></i>
              <p>Breaking News</p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'CategoryList' }" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Category</p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'PostList' }" class="nav-link">
              <i class="nav-icon fab fa-empire"></i>
              <p>News</p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'AddsList' }" class="nav-link">
              <i class="nav-icon fas fa-ad"></i>
              <p>Advertisement</p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'CommentList' }" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Comment</p>
            </router-link>
          </li>
          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'UserList' }" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Users</p>
            </router-link>
          </li>
          <li class="nav-item has-treeview">
            <router-link :to="{ name: 'SettingList' }" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Setting</p>
            </router-link>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
  name: "AdminSidebar",
  computed: {
    admin() {
      return localStorage.getItem("admin_data");
    },
    parsing_admin() {
      return JSON.parse(this.admin);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
