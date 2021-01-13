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
                <h3 class="cart-title">All Comments</h3>
                <div
                  class="card-tools"
                  style="position: absolute; top: 1rem; right: 0.5rem"
                ></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Comment</th>
                      <th>Post Title</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(comment, index) in comments" :key="comment.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ comment.text }}</td>
                      <td v-if="comment.post.title">
                        {{ comment.post.title }}
                      </td>

                      <td>
                        <button
                          class="btn btn-sm btn-warning"
                          @click.prevent="deleteComment(comment.id)"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

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
export default {
  name: "CommentList",
  methods: {
    allComments() {
      this.$Progress.start();
      this.$store.dispatch("post/allCommentsBackend");
      this.$Progress.finish();
    },
    deleteComment(id) {
      axios
        .get("/admin/comment-delete/" + id)
        .then((result) => {
          this.allComments();
          Toast.fire({
            icon: "success",
            title: "Comment Delete successfully",
          });
        })
        .catch((err) => {});
    },
  },
  created() {
    this.allComments();
  },
  computed: {
    comments() {
      return this.$store.getters["post/allComments"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
