<template>
  <div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Employees</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <form @submit.prevent="storeEmployee">
              <div class="form-group row mb-3">
                <label
                  for="first_name"
                  class="col-md-4 col-form-label text-md-right"
                  >First Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.first_name"
                    id="first_name"
                    type="text"
                    class="form-control"
                    name="first_name"
                    required
                    autocomplete="first_name"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="middle_name"
                  class="col-md-4 col-form-label text-md-right"
                  >Middle Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.middle_name"
                    id="middle_name"
                    type="text"
                    class="form-control"
                    name="middle_name"
                    required
                    autocomplete="middle_name"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="last_name"
                  class="col-md-4 col-form-label text-md-right"
                  >Last Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.last_name"
                    id="last_name"
                    type="text"
                    class="form-control"
                    name="last_name"
                    required
                    autocomplete="last_name"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="address"
                  class="col-md-4 col-form-label text-md-right"
                  >Address</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.address"
                    id="address"
                    type="text"
                    class="form-control"
                    name="address"
                    required
                    autocomplete="address"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="country"
                  class="col-md-4 col-form-label text-md-right"
                  >Country</label
                >

                <div class="col-md-6">
                  <select
                    name="country"
                    class="form-control"
                    aria-label="Default select example"
                    v-model="form.country_id"
                    @change="getStates()"
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

              <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-right"
                  >State</label
                >

                <div class="col-md-6">
                  <select
                    name="state"
                    class="form-control"
                    aria-label="Default select example"
                    v-model="form.state_id"
                    @change="getCities()"
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

              <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right"
                  >City</label
                >

                <div class="col-md-6">
                  <select
                    name="city"
                    class="form-control"
                    aria-label="Default select example"
                    v-model="form.city_id"
                  >
                    <option
                      v-for="(city, index) in cities"
                      :key="index"
                      :value="city.id"
                    >
                      {{ city.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="department"
                  class="col-md-4 col-form-label text-md-right"
                  >Department</label
                >

                <div class="col-md-6">
                  <select
                    name="department"
                    class="form-control"
                    aria-label="Default select example"
                    v-model="form.department_id"
                  >
                    <option
                      v-for="(department, index) in departments"
                      :key="index"
                      :value="department.id"
                    >
                      {{ department.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="zip_code"
                  class="col-md-4 col-form-label text-md-right"
                  >Zip code</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.zip_code"
                    id="zip_code"
                    type="text"
                    class="form-control"
                    name="zip_code"
                    required
                    autocomplete="zip_code"
                    autofocus
                  />
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="birthdate"
                  class="col-md-4 col-form-label text-md-right"
                  >Birthdate</label
                >

                <div class="col-md-6">
                  <datepicker
                    v-model="form.birthdate"
                    input-class="form-control"
                  ></datepicker>
                </div>
              </div>

              <div class="form-group row mb-3">
                <label
                  for="date_hired"
                  class="col-md-4 col-form-label text-md-right"
                  >Date Hired</label
                >

                <div class="col-md-6">
                  <datepicker
                    v-model="form.date_hired"
                    input-class="form-control"
                  ></datepicker>
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
import Datepicker from "vuejs-datepicker";
import moment from "moment";

export default {
  components: {
    Datepicker,
  },
  data() {
    return {
      countries: [],
      states: [],
      cities: [],
      departments: [],
      form: {
        first_name: "",
        last_name: "",
        middle_name: "",
        address: "",
        country_id: "",
        state_id: "",
        department_id: "",
        city_id: "",
        zip_code: "",
        birthdate: null,
        date_hired: null,
      },
    };
  },
  created() {
    this.getCountries();
    this.getDepartments();
    this.getStates();
    this.getCities();
  },
  methods: {
    getCountries() {
      axios
        .get("/api/employees/countries")
        .then((res) => {
          this.countries = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getStates() {
      axios
        .get("/api/employees/" + this.form.country_id + "/states")
        .then((res) => {
          this.states = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getDepartments() {
      axios
        .get("/api/employees/departments")
        .then((res) => {
          this.departments = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getCities() {
      axios
        .get("/api/employees/" + this.form.state_id + "/cities")
        .then((res) => {
          this.cities = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    storeEmployee() {
      axios
        .post("/api/employees", {
          first_name: this.form.first_name,
          middle_name: this.form.middle_name,
          last_name: this.form.last_name,
          address: this.form.address,
          country_id: this.form.country_id,
          state_id: this.form.state_id,
          city_id: this.form.city_id,
          department_id: this.form.department_id,
          zip_code: this.form.zip_code,
          birthdate: this.formatDate(this.form.birthdate),
          date_hired: this.formatDate(this.form.date_hired),
        })
        .then((res) => {
          this.$router.push({ name: "EmployeesIndex" });
        });
    },
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("YYYYMMDD");
      }
    },
  },
};
</script>

<style></style>