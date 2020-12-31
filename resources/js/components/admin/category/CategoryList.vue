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
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(category, index) in categories.data"
                      :key="category.id"
                    >
                      <td>{{ index + 1 }}</td>
                      <td>{{ category.name }}</td>

                      <td>
                        <router-link
                          :to="{
                            name: 'CategoryEdit',
                            params: { slug: category.slug },
                          }"
                          class="btn btn-sm btn-success"
                          >Edit</router-link
                        >
                        <button
                          class="btn btn-sm btn-warning"
                          @click.prevent="deleteCategory(category.slug)"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
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
  name: "CategoryList",
  data() {
    return {};
  },
  methods: {
    categoryList() {
      this.$store.dispatch("category/categoryList");
    },
    deleteCategory(slug) {
      axios
        .get("/admin/delete-category/" + slug)
        .then((result) => {
          this.categoryList();
          Toast.fire({
            icon: "success",
            title: "Category Delete successfully",
          });
        })
        .catch((err) => {});
    },
  },
  created() {
    this.categoryList();
  },
  computed: {
    categories() {
      return this.$store.getters["category/categoryList"];
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
