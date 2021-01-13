
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
            <div class="row">
              <div class="col-md-6">
                <div class="card card-primary mt-3">
                  <div class="card-header">
                    <h3 class="card-title">Add Breaking News Here <b></b></h3>
                  </div>

                  <div class="card-body">
                    <div class="form-group">
                      <label for="search_term">Search News</label>
                      <input
                        type="text"
                        class="form-control"
                        id="search_term"
                        placeholder="Search News name"
                        name="search_term"
                        @keyup="searchNews"
                      />
                      <ul class="list-group" id="result" style="display: none">
                        <template v-if="posts.length > 0">
                          <li
                            class="list-group-item"
                            v-for="post in posts"
                            :key="post.id"
                            @click="addPost(post.id)"
                            style="cursor: pointer"
                          >
                            <b>{{ post.title }}</b>
                          </li>
                        </template>
                        <template v-else>
                          <li class="list-group-item">
                            <b>No Product found</b>
                          </li>
                        </template>
                      </ul>
                    </div>
                  </div>
                  <!-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
                </div>
              </div>

              <div class="col-md-6">
                <div class="card mt-3">
                  <div class="card-header">
                    <h3 class="card-title">News List</h3>
                    <div class="card-tools"></div>
                  </div>

                  <div class="card-body">
                    <table
                      id="example2"
                      class="table table-bordered table-hover"
                    >
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Title</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr v-for="(p, index) in breaking_posts" :key="p.id">
                          <td>{{ index + 1 }}</td>
                          <td v-if="p.post.title">{{ p.post.title }}</td>
                          <td>
                            <button
                              @click.prevent="deletePost(p.id)"
                              class="btn btn-sm btn-warning"
                            >
                              Delete
                            </button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
</template>


<script>
export default {
  name: "BreakingPost",
  data() {
    return {
      posts: {},
      form: {
        id: "",
      },
    };
  },
  methods: {
    searchNews() {
      var term = $("#search_term").val();
      if (term != "") {
        axios.get("/admin/search/news/" + term).then((res) => {
          if (res.data.length > 0) {
            $("#result").show();
            this.posts = res.data;
          }
        });
      } else {
        $("#result").hide();
      }
    },
    addPost(id) {
      this.form.id = id;
      axios
        .post("/admin/breaking-news/add", this.form)
        .then((result) => {
          this.breakingPost();
          Toast.fire({
            icon: "success",
            title: "Breaking News Added successfully",
          });
          $("#search_term").val("");
        })
        .catch((err) => {});
      $("#result").hide();
    },
    breakingPost() {
      this.$store.dispatch("post/breakingPost");
    },
    deletePost(id) {
      axios
        .get("/admin/breaking-delete/" + id)
        .then((result) => {
          this.breakingPost();
          Toast.fire({
            icon: "success",
            title: "Breaking News Delete successfully",
          });
        })
        .catch((err) => {});
    },
  },
  created() {
    this.breakingPost();
  },
  computed: {
    breaking_posts() {
      return this.$store.getters["post/postList"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
