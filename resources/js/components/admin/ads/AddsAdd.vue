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
                <h3 class="card-title">Add News</h3>
              </div>

              <form role="form" @submit.prevent="addAds">
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
                    <label for="title">Link</label>
                    <input
                      type="text"
                      class="form-control"
                      id="title"
                      placeholder="Enter Link"
                      v-model="form.link"
                    />
                    <small style="color: red" v-if="errors['link']">{{
                      errors["link"][0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="title">Description</label>
                    <vue-editor v-model="form.description"></vue-editor>
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
                        <small style="color: red" v-if="errors['imageFile']">{{
                          errors["imageFile"][0]
                        }}</small>
                      </div>
                      <div class="col-md-6" v-if="form.image !== ''">
                        <img :src="form.image" width="80" height="80" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            v-model="form.top"
                          />
                          <label class="form-check-label">Top</label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            v-model="form.slider"
                          />
                          <label class="form-check-label">Slider</label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            v-model="form.middle"
                          />
                          <label class="form-check-label">Middle</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- radio -->
                      <div class="form-group">
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            v-model="form.center"
                          />
                          <label class="form-check-label">Center</label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            v-model="form.top_bottom"
                          />
                          <label class="form-check-label">Top Bottom</label>
                        </div>
                        <!-- <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                          />
                          <label class="form-check-label">Middle</label>
                        </div> -->
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
  name: "AddsAdd",
  components: {
    VueEditor,
  },
  data() {
    return {
      form: {
        title: "",
        link: "",
        description: "",
        image: "",
        imageFile: "",
        top: "",
        slider: "",
        middle: "",
        center: "",
        top_bottom: "",
      },
      errors: {},
    };
  },
  methods: {
    handleImage(e) {
      this.form.imageFile = e.target.files[0];
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
    addAds() {
      let formData = new FormData();
      formData.append("title", this.form.title);
      formData.append("link", this.form.link);
      formData.append("description", this.form.description);
      formData.append("imageFile", this.form.imageFile);
      formData.append("top", this.form.top);
      formData.append("slider", this.form.slider);
      formData.append("middle", this.form.middle);
      formData.append("center", this.form.center);
      formData.append("top_bottom", this.form.top_bottom);
      axios
        .post("/admin/ads-add", formData)
        .then((result) => {
          Toast.fire({
            icon: "success",
            title: "Ads Add successfully",
          });
          this.$router.push({ name: "AddsList" });
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
