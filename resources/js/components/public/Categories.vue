<template>
  <span>
    <section id="slide">
      <div class="s-bg slide">
        <div class="container">
          <h2 v-if="posts.category_posts.data[0].category.name">
            {{ posts.category_posts.data[0].category.name }} content
          </h2>
        </div>
      </div>
      <!-- /.sbg -->
      <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li>
            <a href="#">Home</a
            ><i class="fa fa-angle-double-right" aria-hidden="true"></i>
          </li>
          <li>
            <a href="#">{{ this.$route.params.slug }}</a
            ><i class="fa fa-angle-double-right" aria-hidden="true"></i>
          </li>
          <li class="active">{{ this.$route.params.slug }} history</li>
        </ol>
      </div>
    </section>
    <section id="blog">
      <div class="blogg">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div
                class="blog"
                v-for="post in posts.category_posts.data"
                :key="post.id"
              >
                <a href="blog-details.html"
                  ><img :src="`/uploads/post/${post.image}`" alt="image"
                /></a>
                <div class="b-content">
                  <div class="calender">
                    {{ post.date_fm2 }} <span>{{ post.date_fm1 }}</span>
                  </div>
                  <div class="b-txt">
                    <h3>
                      <a href="blog-details.html"
                        >{{ post.title.slice(0, 30) }}...</a
                      >
                    </h3>
                    <p class="content">
                      by
                      <a href="#" class="admin" v-if="post.admin.name">{{
                        post.admin.name
                      }}</a>
                      <span>|</span>
                      <a href="#">with {{ post.comment }} Comments</a>
                      <span>|</span>
                    </p>
                    <p v-html="post.desc"></p>
                  </div>
                </div>
              </div>

              <div>
                <template v-if="posts.category_posts.last_page > 1">
                  <pagination-component
                    :pagination="pagination"
                    :offset="3"
                    @paginate="categoriesPost()"
                  ></pagination-component>
                </template>
              </div>
            </div>
            <div class="col-md-4">
              <div class="right-side">
                <h3 class="border">categories</h3>
                <ul>
                  <li v-for="category in posts.categories" :key="category.id">
                    <router-link
                      :to="{
                        name: 'Categories',
                        params: { slug: category.slug },
                      }"
                      >{{ category.name }}
                    </router-link>
                  </li>
                </ul>
              </div>
              <div class="right-side">
                <h3 class="border">Recent Posts</h3>
                <div class="rp">
                  <div class="RP" v-for="ln in posts.latest_posts" :key="ln.id">
                    <div class="rp-img">
                      <a href="#"
                        ><img :src="`/uploads/post/${ln.image}`" alt="image"
                      /></a>
                    </div>
                    <div class="rp-txt">
                      <h4>
                        <router-link
                          :to="{ name: 'Details', params: { slug: ln.slug } }"
                          >{{ ln.title.slice(0, 20) }}...</router-link
                        >
                      </h4>
                      <p v-if="ln.category.name">
                        {{ ln.category.name }} - {{ ln.date_fm }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="feeds">
                <h3 class="border">For Advertisement</h3>
                <div class="twitt">
                  <div class="tw">
                    <a href="#"
                      ><img
                        src="/frontend/assets/images/add14.jpg"
                        alt="image"
                        class="img-responsive"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container -->
      </div>
      <!-- /.blogg -->
    </section>
  </span>
</template>

<script>
import PaginationComponent from "./inc/PaginationComponent";
export default {
  name: "Categories",
  components: {
    PaginationComponent,
  },
  data() {
    return {
      pagination: {
        current_page: 1,
      },
    };
  },
  methods: {
    categoriesPost() {
      this.$store.dispatch("post/categoriesPost", {
        slug: this.$route.params.slug,
        page: this.pagination.current_page,
      });
    },
  },
  created() {
    this.categoriesPost();
  },
  computed: {
    posts() {
      return this.$store.getters["post/categoriesPost"];
    },

    meta() {
      return {
        current_page: this.posts.category_posts.current_page,
        last_page: this.posts.category_posts.last_page,
        from: this.posts.category_posts.from,
        to: this.posts.category_posts.to,
        per_page: this.posts.category_posts.per_page,
        total: this.posts.category_posts.total,
        path: this.posts.category_posts.path,
      };
    },
    set() {
      return (this.pagination = this.meta);
    },
  },
  watch: {
    $route(to, from) {
      this.categoriesPost();
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
