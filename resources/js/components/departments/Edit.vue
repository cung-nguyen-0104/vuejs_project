<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Edit Departments</div>

          <div class="card-body">
            <form @submit.prevent="updateDepartment">
              <div class="form-group row mb-3">
                <label
                  for="departments_name"
                  class="col-md-4 col-form-label text-md-right"
                  >Country Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.name"
                    id="departments_name"
                    type="text"
                    class="form-control"
                    name="departments_name"
                    required
                    autocomplete="departments_name"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Update
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      form: {
        name: "",
      },
    };
  },
  created() {
    this.getDepartment();
  },
  methods: {
    getDepartment() {
      axios
        .get("/api/departments/" + this.$route.params.id)
        .then((res) => {
          this.form = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updateDepartment() {
      axios
        .put("/api/departments/" + this.$route.params.id, {
          name: this.form.name,
        })
        .then((res) => {
          this.$router.push({ name: "DepartmentsIndex" });
        });
    }
  },
};
</script>

<style></style>