<template>
  <div class="content-wrapper" style="min-height: 1203.6px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit News</h3>
              </div>

              <form role="form" @submit.prevent="editNews">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input
                      type="text"
                      class="form-control"
                      id="title"
                      placeholder="Enter Title"
                      v-model="form.title"
                    />
                    <small style="color: red" v-if="errors['title']">{{
                      errors["title"][0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="title">Category</label>
                    <select class="form-control" v-model="form.category_id">
                      <option value="">Select Category</option>
                      <option
                        :value="category.id"
                        v-for="category in categories"
                        :key="category.id"
                      >
                        {{ category.name }}
                      </option>
                    </select>

                    <small style="color: red" v-if="errors['category_id']">{{
                      errors["category_id"][0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="title">Details</label>
                    <vue-editor v-model="form.details"></vue-editor>

                    <small style="color: red" v-if="errors['details']">{{
                      errors["details"][0]
                    }}</small>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input
                              type="file"
                              class="custom-file-input"
                              id="exampleInputFile"
                              @change="handleImage"
                            />
                            <label
                              class="custom-file-label"
                              for="exampleInputFile"
                              >Choose file</label
                            >
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6" v-if="form.image !== ''">
                        <img :src="photoChange()" width="80" height="80" />
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-1"></div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
import { VueEditor } from "vue2-editor";
export default {
  name: "PostAdd",
  components: {
    VueEditor,
  },
  data() {
    return {
      form: {
        title: "",
        category_id: "",
        details: "",
        image: "",
      },
      imageFile: "",
      errors: {},
    };
  },
  methods: {
    handleImage(e) {
      this.imageFile = e.target.files[0];
      let file = e.target.files[0];
      if (file.size > 1048576) {
        swal.fire({
          icon: "error",
          title: "Oppss...",
          text: "Image Size is Greater than 1MB",
        });
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.image = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
    photoChange() {
      let img = this.form.image;
      if (img.length > 100) {
        return this.form.image;
      } else {
        return `/uploads/post/${this.form.image}`;
      }
    },
    editNews() {
      let formData = new FormData();
      formData.append("title", this.form.title);
      formData.append("category_id", this.form.category_id);
      formData.append("details", this.form.details);
      formData.append("image", this.form.image);
      formData.append("imageFile", this.imageFile);
      formData.append("id", this.form.id);
      axios
        .post("/admin/post-update", formData)
        .then((result) => {
          Toast.fire({
            icon: "success",
            title: "Post Update successfully",
          });
          this.$router.push({ name: "PostList" });
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    categoryList() {
      this.$store.dispatch("category/allCategory");
    },
    post() {
      axios
        .get("/admin/edit-post/" + this.$route.params.slug)
        .then((result) => {
          this.form = result.data.post;
        })
        .catch((err) => {});
    },
  },
  created() {
    this.categoryList();
    this.post();
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

