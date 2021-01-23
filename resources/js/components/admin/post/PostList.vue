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
                <h3 class="cart-title">All News</h3>
                <div
                  class="card-tools"
                  style="position: absolute; top: 1rem; right: 0.5rem"
                >
                  <router-link
                    :to="{ name: 'PostAdd' }"
                    class="btn btn-primary"
                  >
                    Add <i class="fas fa-plus"></i>
                  </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <div class="mb-3">
                  <div class="row">
                    <div class="col-md-2">
                      <strong>Search By</strong>
                    </div>
                    <div class="col-md-3">
                      <select class="form-control form-control-sm">
                        <option value="title">Title</option>
                        <option value="slug">Slug</option>
                      </select>
                    </div>
                    <div class="col-md-7">
                      <input type="text" class="form-control form-control-sm" />
                    </div>
                  </div>
                </div> -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5">SL</th>
                      <th width="50">Title</th>
                      <th width="10">Image</th>
                      <th width="35">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(post, index) in posts.data" :key="post.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ post.title }}</td>
                      <td>
                        <img
                          :src="`/uploads/post/${post.image}`"
                          width="40px"
                          height="40px"
                        />
                      </td>

                      <td>
                        <router-link
                          :to="{
                            name: 'PostEdit',
                            params: { slug: post.slug },
                          }"
                          class="btn btn-sm btn-success"
                          >Edit</router-link
                        >
                        <button
                          @click.prevent="deletePost(post.id)"
                          class="btn btn-sm btn-warning"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <template v-if="posts.last_page > 1">
                <pagination-component
                  :pagination="pagination"
                  :offset="3"
                  @paginate="postList()"
                ></pagination-component>
              </template>

              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <vue-progress-bar></vue-progress-bar>
  </div>
</template>

<script>
import PaginationComponent from "../inc/PaginationComponent";
export default {
  name: "PostList",
  data() {
    return {
      pagination: {
        current_page: 1,
      },
    };
  },
  components: {
    PaginationComponent,
  },
  methods: {
    postList() {
      this.$Progress.start();
      this.$store.dispatch("post/postList", this.pagination.current_page);
      this.$Progress.finish();
    },
    deletePost(id) {
      axios
        .get("/admin/delete-post/" + id)
        .then((result) => {
          this.postList();
          Toast.fire({
            icon: "success",
            title: "Post Delete successfully",
          });
        })
        .catch((err) => {});
    },
  },
  created() {
    this.postList();
  },
  computed: {
    posts() {
      return this.$store.getters["post/postList"];
    },
    meta() {
      return {
        current_page: this.posts.current_page,
        last_page: this.posts.last_page,
        from: this.posts.from,
        to: this.posts.to,
        per_page: this.posts.per_page,
        total: this.posts.total,
        path: this.posts.path,
      };
    },
    set() {
      return (this.pagination = this.meta);
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
