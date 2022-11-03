<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <form @submit.prevent="storeCountry">
              <div class="form-group row mb-3">
                <label
                  for="country_name"
                  class="col-md-4 col-form-label text-md-right"
                  >Country Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.name"
                    id="country_name"
                    type="text"
                    class="form-control"
                    name="country_name"
                    required
                    autocomplete="country_name"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="country_code"
                  class="col-md-4 col-form-label text-md-right"
                  >Country code</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.code"
                    id="country_code"
                    type="text"
                    class="form-control"
                    name="country_code"
                    required
                    autocomplete="country_code"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Register
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
        code: "",
      },
    };
  },
  
  methods: {
    storeCountry() {
      axios
        .post("/api/countries", {
          country_code: this.form.code,
          name: this.form.name,
        })
        .then((res) => {
          this.$router.push({ name: "CountriesIndex" });
        });
    },
  },
};
</script>

<style></style>