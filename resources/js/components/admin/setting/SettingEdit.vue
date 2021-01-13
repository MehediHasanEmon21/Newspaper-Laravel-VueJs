<template>
  <div class="content-wrapper" style="min-height: 1203.6px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Setting</h3>
              </div>

              <form role="form" @submit.prevent="editSetting">
                <div class="card-body">
                  <div class="form-group">
                    <label for="category_name">Title</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.name"
                    />
                    <small style="color: red" v-if="errors['name']">{{
                      errors["name"][0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="category_name">Email</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.email"
                    />
                    <small style="color: red" v-if="errors['email']">{{
                      errors["email"][0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="category_name">Mobile</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.mobile"
                    />
                    <small style="color: red" v-if="errors['mobile']">{{
                      errors["mobile"][0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="category_name">Address</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.address"
                    />
                    <small style="color: red" v-if="errors['address']">{{
                      errors["address"][0]
                    }}</small>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-3"></div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
  name: "SettingEdit",
  data() {
    return {
      form: {},
      errors: {},
    };
  },
  methods: {
    editSetting() {
      axios
        .post("/admin/update-setting", this.form)
        .then((result) => {
          Toast.fire({
            icon: "success",
            title: "Setting Update successfully",
          });
          this.$router.push({ name: "SettingList" });
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    editData() {
      axios
        .get("/admin/edit-setting/" + this.$route.params.id)
        .then((result) => {
          this.form = result.data.setting;
        })
        .catch((err) => {});
    },
  },

  created() {
    this.editData();
  },
};
</script>

<style lang="scss" scoped>
</style>
