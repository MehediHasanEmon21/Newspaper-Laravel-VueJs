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
                <h3 class="cart-title">All Ads</h3>
                <div
                  class="card-tools"
                  style="position: absolute; top: 1rem; right: 0.5rem"
                >
                  <router-link
                    :to="{ name: 'AddsAdd' }"
                    class="btn btn-primary"
                  >
                    Add <i class="fas fa-plus"></i>
                  </router-link>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5">SL</th>
                      <th width="25">Title</th>
                      <th width="25">Link</th>
                      <th width="10">Image</th>
                      <th width="35">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(ad, index) in ads.data" :key="ad.id">
                      <td>{{ index + 1 }}</td>
                      <td>{{ ad.title }}</td>
                      <td>{{ ad.link }}</td>
                      <td>
                        <img
                          :src="`/uploads/ads/${ad.image}`"
                          width="40px"
                          height="40px"
                        />
                      </td>

                      <td>
                        <router-link
                          :to="{
                            name: 'AddsEdit',
                            params: { id: ad.id },
                          }"
                          class="btn btn-sm btn-success"
                          >Edit</router-link
                        >
                        <button
                          @click.prevent="deleteAdd(ad.id)"
                          class="btn btn-sm btn-warning"
                        >
                          Delete
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <template v-if="ads.last_page > 1">
                <pagination-component
                  :pagination="pagination"
                  :offset="3"
                  @paginate="adsList()"
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
    adsList() {
      this.$Progress.start();
      this.$store.dispatch("ads/adsList", this.pagination.current_page);
      this.$Progress.finish();
    },
    deleteAdd(id) {
      axios
        .get("/admin/delete-ads/" + id)
        .then((result) => {
          this.adsList();
          Toast.fire({
            icon: "success",
            title: "Add Delete successfully",
          });
        })
        .catch((err) => {});
    },
  },
  created() {
    this.adsList();
  },
  computed: {
    ads() {
      return this.$store.getters["ads/adsList"];
    },
    meta() {
      return {
        current_page: this.ads.current_page,
        last_page: this.ads.last_page,
        from: this.ads.from,
        to: this.ads.to,
        per_page: this.ads.per_page,
        total: this.ads.total,
        path: this.ads.path,
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
