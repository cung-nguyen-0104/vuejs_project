<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <div class="row">
        <div class="col">
          <form>
            <div class="form-row align-items-center">
              <div class="col">
                <!-- thêm lazy là gõ xong sẽ search, còn k thêm thì gõ đến đâu search đến đấy -->
                <input
                  type="search"
                  v-model.lazy="search"
                  class="form-control mb-2"
                  id="inlineFormInput"
                  placeholder="Viet Nam"
                />
              </div>
              <div class="col">
                <button type="submit" class="btn btn-primary mb-2">
                  Search
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <router-link
        :to="{ name: 'CountriesCreate' }"
        class="btn btn-outline-success px-5"
        >Create</router-link
      >
    </div>
    <div v-if="showMessage">
      <div class="alert alert-success">{{ message }}</div>
    </div>
    <div class="row">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Country Code</th>
            <th scope="col">Name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(country, index) in countries" :key="index">
            <th scope="row">{{ country.id }}</th>
            <td>{{ country.code }}</td>
            <td>{{ country.name }}</td>
            <td>
              <router-link
                :to="{ name: 'CountriesEdit', params: { id: country.id } }"
                class="btn btn-outline-success px-5"
                >Edit</router-link
              >
              <button
                class="btn btn-outline-danger px-5"
                @click="deleteCountry(country.id)"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      countries: [],
      showMessage: false,
      message: "",
      search: null,
    };
  },
  created() {
    this.getCountries();
  },
  watch: {
    search() {
      this.getCountries();
    },
  },
  methods: {
    getCountries() {
      axios
        .get("/api/countries", {
          params: {
            search: this.search,
            department_id: this.selectDepartment,
          },
        })
        .then((res) => {
          this.countries = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteCountry(id) {
      axios
        .delete("/api/countries/" + id)
        .then((res) => {
          this.getCountries();
          this.showMessage = true;
          this.message = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style></style>