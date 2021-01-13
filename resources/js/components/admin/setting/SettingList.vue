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
                <h3 class="cart-title">Settings</h3>
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
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(setting, index) in settings" :key="setting.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ setting.name }}</td>
                      <td>{{ setting.mobile }}</td>
                      <td>{{ setting.email }}</td>
                      <td>{{ setting.address }}</td>

                      <td>
                        <a class="btn btn-sm btn-success">Edit</a>
                      </td>
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
  </div>
</template>

<script>
export default {
  name: "SettingList",
  methods: {
    settingList() {
      this.$store.dispatch("setting/settingList");
    },
  },
  created() {
    this.settingList();
  },
  computed: {
    settings() {
      return this.$store.getters["setting/settingList"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
