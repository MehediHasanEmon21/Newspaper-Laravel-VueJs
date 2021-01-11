<template>
  <span>
    <section id="slide">
      <div class="s-bg slide">
        <div class="container">
          <h2>sports content</h2>
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
            <a href="#">entertaimant</a
            ><i class="fa fa-angle-double-right" aria-hidden="true"></i>
          </li>
          <li class="active">entertaiman history</li>
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
                      by <a href="#" class="admin">Admin</a> <span>|</span>
                      <a href="#">with 3 Comments</a> <span>|</span>
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
                    <a href="#">{{ category.name }} </a>
                  </li>
                </ul>
              </div>
              <div class="right-side">
                <h3 class="border">Recent Posts</h3>
                <div class="rp">
                  <div class="RP">
                    <div class="rp-img">
                      <a href="#"
                        ><img
                          src="/frontend/assets/images/th (2).jpg"
                          alt="image"
                      /></a>
                    </div>
                    <div class="rp-txt">
                      <h4><a href="#">Every Golden Snow Land</a></h4>
                      <p>Business - Aug 2015</p>
                    </div>
                  </div>
                  <div class="RP">
                    <div class="rp-img">
                      <a href="#"
                        ><img
                          src="/frontend/assets/images/sps2.jpg"
                          alt="image"
                      /></a>
                    </div>
                    <div class="rp-txt">
                      <h4><a href="#">Every Golden Snow Land</a></h4>
                      <p>Business - Aug 2015</p>
                    </div>
                  </div>
                  <div class="RP">
                    <div class="rp-img">
                      <a href="#"
                        ><img
                          src="/frontend/assets/images/sps1.jpg"
                          alt="image"
                      /></a>
                    </div>
                    <div class="rp-txt">
                      <h4><a href="#">Every Golden Snow Land</a></h4>
                      <p>Business - Aug 2015</p>
                    </div>
                  </div>
                  <div class="RP">
                    <div class="rp-img">
                      <a href="#"
                        ><img src="/frontend/assets/images/sp1.jpg" alt="image"
                      /></a>
                    </div>
                    <div class="rp-txt">
                      <h4><a href="#">Every Golden Snow Land</a></h4>
                      <p>Business - Aug 2015</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="blog-tag">
                <h3 class="border">popular tags</h3>
                <ul>
                  <li><a href="#" class="hvr-rectangle-in">animal</a></li>
                  <li>
                    <a href="#" class="hvr-rectangle-in">graphic design</a>
                  </li>
                  <li><a href="#" class="hvr-rectangle-in">business</a></li>
                  <li><a href="#" class="hvr-rectangle-in">identity</a></li>
                  <li><a href="#" class="hvr-rectangle-in">blog</a></li>
                  <li><a href="#" class="hvr-rectangle-in">travel</a></li>
                  <li><a href="#" class="hvr-rectangle-in">format</a></li>
                  <li><a href="#" class="hvr-rectangle-in">life style</a></li>
                  <li><a href="#" class="hvr-rectangle-in">quote</a></li>
                  <li><a href="#" class="hvr-rectangle-in">news post</a></li>
                </ul>
              </div>
              <div class="feeds">
                <h3 class="border">twitter feeds</h3>
                <div class="twitt">
                  <div class="tw">
                    <div class="tw-icon">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                    <div class="tw-txt">
                      <p>
                        The standard chunk of Lore Ipsuusesince the reproduced
                        below.
                      </p>
                      <a href="#">http://every.to/EV77F</a>
                      <div class="link">
                        <button class="btn btn-default hvr-rectangle-in">
                          3 min ago
                        </button>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <div class="tw">
                    <div class="tw-icon">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                    <div class="tw-txt">
                      <p>
                        The standard chunk of Lore Ipsuusesince the reproduced
                        below.
                      </p>
                      <a href="#">http://every.to/EV77F</a>
                      <div class="link">
                        <button class="btn btn-default hvr-rectangle-in">
                          3 min ago
                        </button>
                      </div>
                    </div>
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
