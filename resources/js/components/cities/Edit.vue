<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">City</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Edit city</div>

          <div class="card-body">
            <form @submit.prevent="updateCity">
              <div class="form-group row mb-3">
                <label
                  for="state_name"
                  class="col-md-4 col-form-label text-md-right"
                  >State Name</label
                >

                <div class="col-md-6">
                  <select
                    name="state"
                    class="form-control"
                    aria-label="Default select example"
                    v-model="form.state_id"
                  >
                    <option
                      v-for="(state, index) in states"
                      :key="index"
                      :value="state.id"
                    >
                      {{ state.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="name"
                  class="col-md-4 col-form-label text-md-right"
                  >City Name</label
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
      states: [],
      form: {
        name: "",
        state_id: "",
      },
    };
  },
  created() {
    this.getStates();
    this.getCity();
  },
  methods: {
    getStates() {
      axios
        .get("/api/states")
        .then((res) => {
          this.states = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getCity() {
      axios
        .get("/api/cities/" + this.$route.params.id)
        .then((res) => {
          this.form = {
            name: res.data.data.name,
            state_id: res.data.data.state.id
          };
        })
        .catch((err) => {
          console.log(err);
        });
    },
    updateCity() {
      axios
        .put("/api/cities/" + this.$route.params.id, {
          state_id: this.form.state_id,
          name: this.form.name,
        })
        .then((res) => {
          this.$router.push({ name: "CitiesIndex" });
        });
    }
  },
};
</script>

<style></style>