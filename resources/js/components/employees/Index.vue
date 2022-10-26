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
                  placeholder="Jane Doe"
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
      <div class="col">
        <select
          name="department"
          class="form-control"
          aria-label="Default select example"
          v-model="selectDepartment"
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
      <router-link
        :to="{ name: 'EmployeesCreate' }"
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
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Address</th>
            <th scope="col">Department</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(employee, index) in employees" :key="index">
            <th scope="row">{{ employee.id }}</th>
            <td>{{ employee.first_name }}</td>
            <td>{{ employee.last_name }}</td>
            <td>{{ employee.address }}</td>
            <td>{{ employee.department.name }}</td>
            <td>
              <router-link
                :to="{ name: 'EmployeesEdit', params: { id: employee.id } }"
                class="btn btn-outline-success px-5"
                >Edit</router-link
              >
              <button
                class="btn btn-outline-danger px-5"
                @click="deleteEmployee(employee.id)"
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
      employees: [],
      showMessage: false,
      message: "",
      search: null,
      departments: [],
      selectDepartment: null,
    };
  },
  created() {
    this.getEmployees();
    this.getDepartments();
  },
  watch: {
    search() {
      this.getEmployees();
    },
    selectDepartment() {
      this.getEmployees();
    }
  },
  methods: {
    getEmployees() {
      axios
        .get("/api/employees", {params: {
          search: this.search,
          department_id: this.selectDepartment
        }})
        .then((res) => {
          this.employees = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteEmployee(id) {
      axios
        .delete("/api/employees/" + id)
        .then((res) => {
          this.getEmployees();
          this.showMessage = true;
          this.message = res.data;
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
  },
};
</script>

<style></style>