<template>
  <span id="public_header">
    <section id="header-top2 ">
      <div class="h-mid">
        <div class="container">
          <div class="col-md-4">
            <div class="logo">
              <router-link :to="{ name: 'Home' }"
                ><img
                  src="/frontend/assets/images/logo.png"
                  alt="image"
                  class="img-responsive"
              /></router-link>
            </div>
          </div>
          <div class="col-md-4">
            <div class="add">
              <a href="#"
                ><img
                  src="/frontend/assets/images/add3.gif"
                  alt="image"
                  class="img-responsive"
              /></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Menu -->
    <div id="main-menu">
      <div class="main-menu">
        <div class="container">
          <div class="row">
            <div class="m-menu">
              <div class="col-md-12">
                <div class="navbar navbar-default fixed" role="navigation">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button
                        type="button"
                        class="navbar-toggle collapsed"
                        data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"
                      >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button
                      ><!-- /.navbar-toggle collapsed -->
                    </div>
                    <!-- /.navbar-header -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <nav
                      class="collapse navbar-collapse navbar-right"
                      id="bs-example-navbar-collapse-1"
                    >
                      <div class="navmenu">
                        <ul>
                          <li>
                            <router-link :to="{ name: 'Home' }"
                              >home</router-link
                            >
                          </li>

                          <li v-for="category in categories" :key="category.id">
                            <router-link
                              :to="{
                                name: 'Categories',
                                params: { slug: category.slug },
                              }"
                              >{{ category.name }}</router-link
                            >
                          </li>
                          <li>
                            <router-link :to="{ name: 'Contact' }"
                              >contact</router-link
                            >
                          </li>
                          <template v-if="user && user.id != null">
                            <li>
                              <router-link
                                :to="{ name: 'Logout' }"
                                style="cursor: pointer"
                                >Logout</router-link
                              >
                            </li>
                          </template>
                          <template v-else>
                            <li>
                              <router-link :to="{ name: 'Login' }"
                                >Login</router-link
                              >
                            </li>
                            <li>
                              <router-link :to="{ name: 'Register' }"
                                >Signup</router-link
                              >
                            </li>
                          </template>
                        </ul>
                      </div>
                    </nav>
                    <!-- /.navbar-collapse -->
                  </div>
                  <!-- /.container-fluid -->
                </div>
              </div>
              <!-- /.navbar navbar-default -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.full-main-menu -->
    </div>
  </span>
</template>

<script>
export default {
  name: "PublicHeader",
  data() {
    return {};
  },
  methods: {
    categoryList() {
      this.$store.dispatch("category/frontendCategory");
    },
    getUser() {
      this.$store.dispatch("user/getUser");
    },
  },
  created() {
    this.categoryList();
    this.getUser();
  },
  computed: {
    categories() {
      return this.$store.getters["category/categoryList"];
    },
    user() {
      return this.$store.getters["user/getUser"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
