<template>
  <span>
    <section id="slide">
      <div class="sbg">
        <div class="container">
          <h1>Register</h1>
          <h3>SHARE<br />WITH<br />WORLD</h3>
        </div>
      </div>
      <!-- /.sbg -->
    </section>
    <!-- /#slide -->
    <!-- End Slide -->
    <div class="contract-us">
      <!-- Start contact-us -->
      <section id="contact-us">
        <div class="container">
          <div class="contact-us">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6 col-sm-6">
                <form @submit.prevent="signUp">
                  <div class="c-txt">
                    <h4>Register</h4>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="name"
                            v-model="form.name"
                          />
                          <small class="text-danger" v-if="errors.name">{{
                            errors.name[0]
                          }}</small>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input
                            style="text-transform: lowercase"
                            type="email"
                            class="form-control"
                            placeholder="email"
                            v-model="form.email"
                          />
                          <small class="text-danger" v-if="errors.email">{{
                            errors.email[0]
                          }}</small>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control"
                            placeholder="password"
                            v-model="form.password"
                          />
                          <small class="text-danger" v-if="errors.password">{{
                            errors.password[0]
                          }}</small>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control"
                            placeholder="conform password"
                            v-model="form.password_confirmation"
                          />
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="custom-btn">submit</button>
                  </div>
                </form>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>
        </div>
        <!-- container -->
      </section>
      <!-- contact-us -->
      <!-- End contact-us -->
    </div>
  </span>
</template>

<script>
export default {
  name: "Register",
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      errors: {},
    };
  },
  methods: {
    signUp() {
      axios
        .post("/api/user/user-register", this.form)
        .then((result) => {
          localStorage.setItem(
            "user_access_token",
            result.data.user_access_token
          );
          localStorage.setItem(
            "user_data",
            JSON.stringify(result.data.user_data)
          );
          Toast.fire({
            icon: "success",
            title: "Signed Up successfully",
          });
          this.getUser();
          this.$router.push({ name: "UserDashboard" });
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    getUser() {
      this.$store.dispatch("user/getUser");
    },
  },

  created() {
    let token = localStorage.getItem("user_access_token");
    if (token) {
      this.$router.push({ name: "UserDashboard" });
    }
  },
};
</script>

<style lang="scss" scoped>
</style>
