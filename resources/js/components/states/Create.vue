<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <form @submit.prevent="storeState">
              <div class="form-group row mb-3">
                <label
                  for="country_name"
                  class="col-md-4 col-form-label text-md-right"
                  >Country Name</label
                >

                <div class="col-md-6">
                  <select
                    name="country"
                    class="form-control"
                    aria-label="Default select example"
                    v-model="form.country_id"
                  >
                    <option
                      v-for="(country, index) in countries"
                      :key="index"
                      :value="country.id"
                    >
                      {{ country.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="country_code"
                  class="col-md-4 col-form-label text-md-right"
                  >State Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.name"
                    id="name"
                    type="text"
                    class="form-control"
                    name="name"
                    required
                    autocomplete="name"
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
      countries: [],
      form: {
        name: "",
        country_id: "",
      },
    };
  },

  created() {
    this.getCountries();
  },
  
  methods: {
     getCountries() {
      axios
        .get("/api/countries")
        .then((res) => {
          this.countries = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    storeState() {
      axios
        .post("/api/states", {
          country_id: this.form.country_id,
          name: this.form.name,
        })
        .then((res) => {
          this.$router.push({ name: "StatesIndex" });
        });
    },
  },
};
</script>

<style></style>