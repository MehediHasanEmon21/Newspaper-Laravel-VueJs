<template>
  <div class="content-wrapper" style="min-height: 1202.48px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="cart-title">All Comments</h3>
                <div
                  class="card-tools"
                  style="position: absolute; top: 1rem; right: 0.5rem"
                ></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(user, index) in users" :key="user.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ user.name }}</td>
                      <td>{{ user.email }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <vue-progress-bar></vue-progress-bar>
  </div>
</template>

<script>
export default {
  name: "UserList",
  methods: {
    userList() {
      this.$Progress.start();
      this.$store.dispatch("user/userList");
      this.$Progress.finish();
    },
  },
  created() {
    this.userList();
  },
  computed: {
    users() {
      return this.$store.getters["user/userList"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
