<template>
  <span>
    <section id="slide">
      <div class="sbg">
        <div class="container">
          <h1>Dashboard</h1>
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
                <h1>This is User Dashboard Panel</h1>
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
  name: "UserDashboard",
  created() {
    let token = localStorage.getItem("user_access_token");
    if (!token) {
      this.$router.push({ name: "Login" });
    }
  },
};
</script>

<style lang="scss" scoped>
</style>
