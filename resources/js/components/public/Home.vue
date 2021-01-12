<template>
  <span id="home">
    <div class="main-menu-container"></div>
    <div class="container">
      <div class="bck-news">
        <div class="col-md-2">
          <div class="brc-news">
            <h3>backing-news ::</h3>
          </div>
        </div>
        <div class="col-md-10">
          <div class="b-n">
            <marquee behavior="scroll" direction="right">
              <p>
                Conveniently exploit performance based systems.without B2B
                expertise. Seamlessly productivate highly efficient paradigms
                whereas intermandated
              </p>
            </marquee>
          </div>
        </div>
        <div class="add">
          <a href="javascript:void()" target="_blank"
            ><img
              :src="`/uploads/ads/${home.top_ad.image}`"
              alt="image"
              class="img-responsive"
          /></a>
        </div>
      </div>
    </div>

    <section id="slider">
      <div class="featured container">
        <div class="row">
          <div class="col-sm-8">
            <!-- Carousel -->
            <div
              id="carousel-example-generic"
              class="carousel slide"
              data-ride="carousel"
            >
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li
                  data-target="#carousel-example-generic"
                  data-slide-to="0"
                  class="active"
                ></li>
                <li
                  data-target="#carousel-example-generic"
                  data-slide-to="1"
                ></li>
                <li
                  data-target="#carousel-example-generic"
                  data-slide-to="2"
                ></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div
                  class="item"
                  :class="index == 0 ? 'active' : ''"
                  v-for="(slider, index) in home.slider_ads"
                  :key="slider.id"
                >
                  <a href=""
                    ><img
                      :src="`/uploads/ads/${slider.image}`"
                      alt="First slide"
                  /></a>
                  <!-- Static Header -->
                  <div class="header-text hidden-xs">
                    <div class="col-md-12 text-center">
                      <a href="#">
                        <h2>{{ slider.title }}</h2>
                      </a>
                      <br />
                      <p v-html="slider.description"></p>
                      <br />
                    </div>
                  </div>
                  <!-- /header-text -->
                </div>
              </div>
              <!-- Controls -->
              <a
                class="left carousel-control"
                href="#carousel-example-generic"
                data-slide="prev"
              >
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
              <a
                class="right carousel-control"
                href="#carousel-example-generic"
                data-slide="next"
              >
                <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
            </div>
            <!-- /carousel -->
          </div>
          <div class="col-md-4">
            <div class="section-top">
              <!-- Swiper -->
              <div class="swiper-container">
                <div class="swiper-wrapper">
                  <div
                    class="swiper-slide"
                    v-for="post in home.random_posts"
                    :key="post.id"
                  >
                    <a href="#"
                      ><img
                        :src="`/uploads/post/${post.image}`"
                        alt="sponsor"
                        class="img-responsive"
                    /></a>
                    <a href="#">
                      <h2>entertaiment</h2>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="section_bottom">
              <img
                src="/frontend/assets/images/slide-2.jpg"
                alt="sponsor"
                class="img-responsive"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <br />

    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">
          <div class="row">
            <div class="col-md-4" v-for="ln in home.latest_posts" :key="ln.id">
              <div class="en-item">
                <router-link
                  class="en-img"
                  :to="{ name: 'Details', params: { slug: ln.slug } }"
                  ><img
                    :src="`/uploads/post/${ln.image}`"
                    alt="en-img1"
                    class="img-responsive"
                  />
                  <h5 v-if="ln.category.name">{{ ln.category.name }}</h5>
                </router-link>
                <router-link
                  :to="{ name: 'Details', params: { slug: ln.slug } }"
                >
                  <h3>{{ ln.title.slice(0, 30) }}...</h3>
                </router-link>
                <p v-html="ln.desc"></p>
                <h6>
                  Posted by<i class="fa fa-user" aria-hidden="true"></i>
                  <a href="#" v-if="ln.admin.name">{{ ln.admin.name }}</a
                  ><span> | </span
                  ><i class="fa fa-clock-o" aria-hidden="true"></i>
                  {{ ln.date_fm }}
                </h6>
              </div>
            </div>
          </div>
          <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <!--/.sidebar-offcanvas-->
      </div>
      <!--/row-->

      <hr />
    </div>

    <div class="container">
      <div class="col-md-12">
        <div class="add2">
          <a href="javascript:void()"
            ><img
              :src="`/uploads/ads/${home.middle_ad.image}`"
              alt="image"
              class="img-responsive"
          /></a>
        </div>
      </div>
    </div>

    <section id="news">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="section-padding">
              <div class="card-header-orange">
                <h1 class="card-heading">
                  {{ home.entertainment_posts[0].category.name }}
                </h1>
              </div>
              <div class="row">
                <div
                  class="col-md-6"
                  v-for="ep in home.entertainment_posts"
                  :key="ep.id"
                >
                  <div class="news-element">
                    <div class="n-box">
                      <div class="videos">
                        <router-link
                          :to="{ name: 'Details', params: { slug: ep.slug } }"
                          ><img
                            :src="`/uploads/post/${ep.image}`"
                            alt="image"
                            class="img-responsive"
                        /></router-link>
                      </div>
                      <div class="n-txt">
                        <h3>
                          <router-link
                            :to="{ name: 'Details', params: { slug: ep.slug } }"
                            >{{ ep.title }}...</router-link
                          >
                        </h3>
                        <h5>
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                          {{ ep.date_fm }} <span> | </span
                          ><i class="fa fa-user" aria-hidden="true"></i>
                          <a href="#" v-if="ep.admin.name">{{
                            ep.admin.name
                          }}</a>
                        </h5>
                        <p v-html="ep.desc"></p>
                        <router-link
                          :to="{ name: 'Details', params: { slug: ep.slug } }"
                          ><button class="custom-btn">
                            read more
                          </button></router-link
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <!--/span-->

                <!--/span-->
              </div>
              <!--/row-->

              <!--  End Entertenmaint -->

              <!--  Start Technology -->

              <div class="container">
                <div class="row row-offcanvas row-offcanvas-right">
                  <div class="col-xs-12 col-sm-9">
                    <div class="category">
                      <h1 class="category">
                        {{ home.sport_posts[0].category.name }}
                      </h1>
                    </div>

                    <div class="row">
                      <div
                        class="col-md-4"
                        v-for="sp in home.sport_posts"
                        :key="sp.id"
                      >
                        <div class="en-item">
                          <router-link
                            class="en-img"
                            :to="{ name: 'Details', params: { slug: sp.slug } }"
                            ><img
                              :src="`/uploads/post/${sp.image}`"
                              alt="en-img1"
                              class="img-responsive"
                            />
                            <h5 v-if="sp.category.name">
                              {{ sp.category.name }}
                            </h5>
                          </router-link>
                          <router-link
                            :to="{ name: 'Details', params: { slug: sp.slug } }"
                          >
                            <h3>{{ sp.title.slice(0, 30) }}...</h3>
                          </router-link>
                          <p v-html="sp.desc"></p>
                          <h6>
                            Posted by<i
                              class="fa fa-user"
                              aria-hidden="true"
                            ></i>
                            <a href="#" v-if="sp.admin.name">{{
                              sp.admin.name
                            }}</a
                            ><span> | </span
                            ><i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{ sp.date_fm }}
                          </h6>
                        </div>
                      </div>
                    </div>
                    <!--/row-->
                  </div>
                  <!--/.col-xs-12.col-sm-9-->

                  <div class="section-padding">
                    <div class="right-side">
                      <div class="new-title">
                        <h3>Pupular Posts</h3>
                      </div>

                      <div
                        class="fp"
                        v-for="pp in home.popular_posts"
                        :key="pp.id"
                      >
                        <div class="FP">
                          <div class="fp-img">
                            <router-link
                              :to="{
                                name: 'Details',
                                params: { slug: pp.post.slug },
                              }"
                              ><img
                                v-if="pp.post.image"
                                :src="`/uploads/post/${pp.post.image}`"
                                alt="image"
                            /></router-link>
                          </div>
                          <div class="fp-txt">
                            <h4 class="rp-title">
                              <router-link
                                :to="{
                                  name: 'Details',
                                  params: { slug: pp.post.slug },
                                }"
                                class=""
                                href="#"
                                v-if="pp.post.title"
                                >{{
                                  pp.post.title.slice(0, 20)
                                }}...</router-link
                              >
                            </h4>
                            <p>
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                              {{ pp.date_fm }}
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="fp">
                        <div class="FP">
                          <div class="new-title">
                            <h3>ADD5678</h3>
                          </div>
                          <a href="#"
                            ><img
                              src="/frontend/assets/images/add4.jpg"
                              alt="image"
                              class="img-responsive"
                          /></a>
                          <!--      <a href="#"><img src="/frontend/assets/images/add2.png" alt="image" class="img-responsive"> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/.sidebar-offcanvas-->
                </div>
                <!--/row-->

                <hr />
              </div>
              <!--/.container-->

              <div class="container">
                <div class="col-md-12">
                  <div class="add2">
                    <a href="javascript:void()"
                      ><img
                        :src="`/uploads/ads/${home.center_ad.image}`"
                        alt="image"
                        class="img-responsive"
                    /></a>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="col-md-12">
                  <div class="add2">
                    <a href="#"
                      ><img
                        src="/frontend/assets/images/333.jpg"
                        alt="image"
                        class="img-responsive"
                    /></a>
                  </div>
                </div>
              </div>

              <!-- Start Recent Post  -->

              <!-- End Recent Post -->

              <!-- Start Business  -->

              <div class="container">
                <div class="row row-offcanvas row-offcanvas-right">
                  <div class="col-xs-12 col-sm-9">
                    <div class="category">
                      <h1 class="category">
                        {{ home.international_big.category.name }}
                      </h1>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="en-item">
                          <router-link
                            class="en-img"
                            :to="{
                              name: 'Details',
                              params: { slug: home.international_big.slug },
                            }"
                            ><img
                              :src="`/uploads/post/${home.international_big.image}`"
                              alt="en-img1"
                              class="img-responsive"
                          /></router-link>
                          <router-link
                            :to="{
                              name: 'Details',
                              params: { slug: home.international_big.slug },
                            }"
                          >
                            <h3>
                              {{ home.international_big.title.slice(0, 30) }}...
                            </h3>
                          </router-link>
                          <p v-html="home.international_big.desc"></p>
                          <h6>
                            Posted by<i
                              class="fa fa-user"
                              aria-hidden="true"
                            ></i>
                            <a
                              href="#"
                              v-if="home.international_big.admin.name"
                              >{{ home.international_big.admin.name }}</a
                            ><span> | </span
                            ><i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{ home.international_big.date_fm }}
                          </h6>
                        </div>
                      </div>

                      <div
                        class="col-md-4"
                        v-for="ip in home.international_posts"
                        :key="ip.id"
                      >
                        <div class="en-item">
                          <router-link
                            class="en-img"
                            :to="{ name: 'Details', params: { slug: ip.slug } }"
                            ><img
                              :src="`/uploads/post/${ip.image}`"
                              alt="en-img1"
                              class="img-responsive"
                          /></router-link>
                          <router-link
                            :to="{ name: 'Details', params: { slug: ip.slug } }"
                          >
                            <h3>{{ ip.title.slice(0, 30) }}...</h3>
                          </router-link>
                          <p v-html="ip.desc"></p>
                          <h6>
                            Posted by<i
                              class="fa fa-user"
                              aria-hidden="true"
                            ></i>
                            <a href="#" v-if="ip.admin.name">{{
                              ip.admin.name
                            }}</a
                            ><span> | </span
                            ><i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{ ip.date_fm }}
                          </h6>
                        </div>
                      </div>
                    </div>
                    <!--/row-->
                  </div>
                  <!--/.col-xs-12.col-sm-9-->

                  <div class="section-padding">
                    <div class="right-side">
                      <div class="new-title">
                        <h3>Latest Posts</h3>
                      </div>

                      <div
                        class="fp"
                        v-for="ln in home.latest_posts"
                        :key="ln.id"
                      >
                        <div class="FP">
                          <div class="fp-img">
                            <router-link
                              :to="{
                                name: 'Details',
                                params: { slug: ln.slug },
                              }"
                              ><img
                                :src="`/uploads/post/${ln.image}`"
                                alt="image"
                            /></router-link>
                          </div>
                          <div class="fp-txt">
                            <h4 class="rp-title">
                              <router-link
                                class=""
                                :to="{
                                  name: 'Details',
                                  params: { slug: ln.slug },
                                }"
                                >{{ ln.title.slice(0, 20) }}...</router-link
                              >
                            </h4>
                            <p>
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                              {{ ln.date_fm }}
                            </p>
                          </div>
                        </div>
                      </div>

                      <!-- <div class="fp">
                        <div class="FP">
                          <div class="new-title">
                            <h3>For Advertise</h3>
                          </div>
                          <a href="#"
                            ><img
                              src="/frontend/assets/images/add14.jpg"
                              alt="image"
                              class="img-responsive"
                          /></a>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <!--/.sidebar-offcanvas-->
                </div>
                <!--/row-->

                <hr />
              </div>
              <!--/.container-->

              <!-- End Business -->

              <!-- Feature Job -->

              <div class="container">
                <div class="col-md-12">
                  <div class="add2">
                    <a :href="home.top_bottom.link" target="_blank"
                      ><img
                        :src="`/uploads/ads/${home.top_bottom.image}`"
                        alt="image"
                        class="img-responsive"
                    /></a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Start Sports  -->

            <div class="container">
              <div class="row row-offcanvas row-offcanvas-right">
                <div class="col-xs-12 col-sm-12">
                  <div class="category12">
                    <h1 class="category12">
                      {{ home.bangladesh_posts[0].category.name }}
                    </h1>
                  </div>
                  <div class="row">
                    <div
                      class="col-md-4"
                      v-for="bp in home.bangladesh_posts"
                      :key="bp.id"
                    >
                      <div class="en-item">
                        <router-link
                          class="en-img"
                          :to="{ name: 'Details', params: { slug: bp.slug } }"
                          ><img
                            :src="`/uploads/post/${bp.image}`"
                            alt="en-img1"
                            class="img-responsive"
                          />
                          <h5 v-if="bp.category.name">
                            {{ bp.category.name }}
                          </h5>
                        </router-link>
                        <router-link
                          :to="{ name: 'Details', params: { slug: bp.slug } }"
                        >
                          <h3>{{ bp.title.slice(0, 30) }}...</h3>
                        </router-link>
                        <p v-html="bp.desc"></p>
                        <h6>
                          Posted by<i class="fa fa-user" aria-hidden="true"></i>
                          <a href="#" v-if="bp.admin.name">{{
                            bp.admin.name
                          }}</a
                          ><span> | </span
                          ><i class="fa fa-clock-o" aria-hidden="true"></i>
                          {{ bp.date_fm }}
                        </h6>
                      </div>
                    </div>
                  </div>
                  <!--/row-->
                </div>
                <!--/.col-xs-12.col-sm-9-->

                <!--/.sidebar-offcanvas-->
              </div>
              <!--/row-->

              <hr />
            </div>
            <!--/.container-->

            <!-- End Sports -->
          </div>
        </div>
      </div>
    </section>
  </span>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {};
  },
  methods: {
    homePost() {
      this.$store.dispatch("post/homePost");
    },
  },
  created() {
    this.homePost();
  },
  computed: {
    home() {
      return this.$store.getters["post/homePost"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
