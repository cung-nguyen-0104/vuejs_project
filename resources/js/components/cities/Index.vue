<template>
<div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="row">
      <div class="col">
        <form>
          <div class="form-row align-items-center">
            <div class="col">
              <input
                type="search"
                v-model.lazy="search"
                class="form-control mb-2"
                id="inlineFormInput"
                placeholder="Hoai Duc"
              />
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <router-link
      :to="{ name: 'CitiesCreate' }"
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
            <th scope="col">#</th>
            <th scope="col">State name</th>
            <th scope="col">City name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(city, index) in cities" :key="index">
            <th scope="row">{{city.id}}</th>
            <td>{{city.state.name}}</td>
            <td>{{city.name}}</td>
            <td>
              <router-link
                :to="{ name: 'CitiesEdit', params: { id: city.id } }"
                class="btn btn-outline-success px-5"
                >Edit</router-link
              >
              <button
                class="btn btn-outline-danger px-5"
                @click="deleteCity(city.id)"
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
      cities: [],
      showMessage: false,
      message: "",
      search: null,
    };
  },
  created() {
    this.getCities();
  },
  watch: {
    search() {
      this.getCities();
    },
  },
  methods: {
    getCities() {
      axios
        .get("/api/cities", {
          params: {
            search: this.search,
          },
        })
        .then((res) => {
          this.cities = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteCity(id) {
      axios
        .delete("/api/cities/" + id)
        .then((res) => {
          this.getCities();
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