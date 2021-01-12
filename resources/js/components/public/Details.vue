<template>
  <span id="details">
    <section id="slide">
      <div class="s-bg slide">
        <div class="container">
          <h2>blog details content</h2>
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
            <a href="#">blog</a
            ><i class="fa fa-angle-double-right" aria-hidden="true"></i>
          </li>
          <li class="active">blog history</li>
        </ol>
      </div>
    </section>
    <!-- /#slide -->
    <!-- Start blog -->
    <section id="blog">
      <div class="blogg">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="blog">
                <img :src="`/uploads/post/${single.post.image}`" alt="image" />
              </div>
              <div class="blog-c">
                <div class="calender">
                  {{ single.post.date_fm2 }}
                  <span>{{ single.post.date_fm1 }}</span>
                </div>
                <div class="b-txt">
                  <h3>{{ single.post.title }}</h3>
                  <p class="content">
                    by
                    <a href="#" class="admin" v-if="single.post.admin.name">{{
                      single.post.admin.name
                    }}</a>
                    <span>|</span>
                    <a href="#">with {{ single.post.comment }} Comments</a>
                    <span>|</span>
                  </p>

                  <div class="b-single" v-html="single.post.details"></div>
                  <div class="b-menu">
                    <i class="fa fa-tag" aria-hidden="true"></i>
                    <ul>
                      <li
                        v-for="category in single.categories"
                        :key="category.id"
                      >
                        <router-link
                          :to="{
                            name: 'Categories',
                            params: { slug: category.slug },
                          }"
                          >{{ category.name }}</router-link
                        >
                      </li>
                    </ul>
                  </div>
                  <div class="share-post"></div>
                  <div class="a-post">
                    <img src="/frontend/assets/images/c2.jpg" alt="image" />
                    <div class="a-txt">
                      <h5>
                        About This Post : <a href="#" class="admin">Admin</a>
                      </h5>
                      <p>
                        But I must explain to you how all this mistaken idea of
                        denouncing pleasure and praising pain was born and I
                        will give you a complete.
                      </p>
                    </div>
                  </div>
                  <div class="rel-post">
                    <h3>RELATED POSTS</h3>
                    <div
                      class="rel-img"
                      v-for="post in single.related_posts"
                      :key="post.id"
                    >
                      <a href="#"
                        ><img :src="`/uploads/post/${post.image}`" alt="image"
                      /></a>
                      <h4>
                        <a href="#">{{ post.title.slice(0, 30) }}...</a>
                      </h4>
                      <p>{{ post.date_fm }}</p>
                    </div>
                  </div>

                  <div id="comments" class="comments-area">
                    <h5 class="comments-title">Comments on This Post</h5>
                    <ol class="comment-list">
                      <li id="comment-1" class="comment depth-1 parent">
                        <template v-if="comments">
                          <article
                            id="div-comment-1"
                            class="comment-body"
                            v-for="comment in comments"
                            :key="comment.id"
                          >
                            <footer class="comment-meta">
                              <div class="comment-author">
                                <img
                                  src="/admin/images/default_avatar.png"
                                  alt="image"
                                  style="border-radius: 50%"
                                />
                              </div>
                              <!-- .comment-author -->
                            </footer>
                            <!-- .comment-meta -->

                            <div class="comment-content">
                              <strong class="fn" v-if="comment.user.name">{{
                                comment.user.name
                              }}</strong>

                              <p>
                                {{ comment.text }}
                                <br /><span>2 min</span>
                              </p>
                            </div>
                          </article>
                        </template>

                        <!-- .comment-body -->

                        <!-- .children -->
                      </li>
                      <!-- #comment-## -->
                    </ol>
                    <!-- .comment-list -->

                    <div id="respond" class="comment-respond">
                      <h4 id="reply-title" class="comment-reply-title">
                        leave a comments
                      </h4>
                      <form
                        method="post"
                        id="commentform"
                        class="comment-form"
                        @submit.prevent="addComment"
                      >
                        <p class="comment-form-comment">
                          <label for="comment">Comment</label>
                          <textarea
                            id="comment"
                            class="form-control"
                            v-model="form.text"
                            rows="7"
                            maxlength="65525"
                            aria-required="true"
                          ></textarea>

                          <small style="color: red" v-if="errors['text']">{{
                            errors["text"][0]
                          }}</small>
                        </p>

                        <p class="form-submit">
                          <input
                            name="submit"
                            type="submit"
                            id="submit"
                            class="submit"
                            value="submit"
                          />
                        </p>
                      </form>
                    </div>
                    <!-- #respond -->
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="right-side">
                <h3 class="border">categories</h3>
                <ul>
                  <li v-for="category in single.categories" :key="category.id">
                    <router-link
                      :to="{
                        name: 'Categories',
                        params: { slug: category.slug },
                      }"
                      >{{ category.name }}</router-link
                    >
                  </li>
                </ul>
              </div>
              <div class="right-side">
                <h3 class="border">Recent Posts</h3>
                <div class="rp">
                  <div
                    class="RP"
                    v-for="ln in single.latest_posts"
                    :key="ln.id"
                  >
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
    <!-- /#blog -->
    <!-- Start blog -->
  </span>
</template>

<script>
export default {
  name: "Details",
  data() {
    return {
      form: {
        text: "",
      },
      errors: {},
    };
  },
  methods: {
    singlePost() {
      this.$store.dispatch("post/singlePost", this.$route.params.slug);
    },
    allComments() {
      this.$store.dispatch("post/allComments", this.$route.params.slug);
    },
    addComment() {
      let user_access_token = localStorage.getItem("user_access_token");
      if (user_access_token) {
        axios
          .post("/add-comment", {
            text: this.form.text,
            post_id: this.single.post.id,
            user_id: this.parsing_user.id,
          })
          .then((result) => {
            Toast.fire({
              icon: "success",
              title: "Comment added successfully",
            });
            this.form.text = "";
            this.allComments();
          })
          .catch((err) => {
            this.errors = err.response.data.errors;
          });
      } else {
        Toast.fire({
          icon: "error",
          title: "Login First!!",
        });
        this.$router.push({ name: "Login" });
      }
    },
  },
  created() {
    this.singlePost();
    this.allComments();
  },
  computed: {
    comments() {
      return this.$store.getters["post/allComments"];
    },
    single() {
      return this.$store.getters["post/singlePost"];
    },
    user() {
      return localStorage.getItem("user_data");
    },
    parsing_user() {
      return JSON.parse(this.user);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
