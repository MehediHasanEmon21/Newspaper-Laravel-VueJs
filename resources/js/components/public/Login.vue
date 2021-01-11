<template>
  <span>
    <section id="slide">
      <div class="sbg">
        <div class="container">
          <h1>Login</h1>
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
                <form @submit.prevent="userLogin">
                  <div class="c-txt">
                    <h4>Login</h4>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input
                            type="email"
                            class="form-control"
                            v-model="form.email"
                            placeholder="email"
                            style="text-transform: lowercase"
                          />
                          <small style="color: red" v-if="errors['email']">{{
                            errors["email"][0]
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
                          <small style="color: red" v-if="errors['password']">{{
                            errors["password"][0]
                          }}</small>
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
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: {},
    };
  },
  methods: {
    userLogin() {
      axios
        .post("/api/user/login", this.form)
        .then((result) => {
          if (result.data == "error") {
            Toast.fire({
              icon: "error",
              title: "Email or Password Not Valid",
            });
          } else {
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
              title: "Logged In successfully",
            });
            this.getUser();
            this.$router.push({ name: "Home" });
          }
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    getUser() {
      this.$store.dispatch("user/getUser");
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
