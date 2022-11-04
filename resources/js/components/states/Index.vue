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
                placeholder="Newyork"
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
      :to="{ name: 'StatesCreate' }"
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
            <th scope="col">Country name</th>
            <th scope="col">State name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(state, index) in states" :key="index">
            <th scope="row">{{state.id}}</th>
            <td>{{state.country.name}}</td>
            <td>{{state.name}}</td>
            <td>
              <router-link
                :to="{ name: 'StatesEdit', params: { id: state.id } }"
                class="btn btn-outline-success px-5"
                >Edit</router-link
              >
              <button
                class="btn btn-outline-danger px-5"
                @click="deleteState(state.id)"
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
      states: [],
      showMessage: false,
      message: "",
      search: null,
    };
  },
  created() {
    this.getStates();
  },
  watch: {
    search() {
      this.getStates();
    },
  },
  methods: {
    getStates() {
      axios
        .get("/api/states", {
          params: {
            search: this.search,
          },
        })
        .then((res) => {
          this.states = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteState(id) {
      axios
        .delete("/api/states/" + id)
        .then((res) => {
          this.getStates();
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