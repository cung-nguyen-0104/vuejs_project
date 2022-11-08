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
                  placeholder="laravel"
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
        :to="{ name: 'DepartmentsCreate' }"
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
            <th scope="col">Department Name</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(department, index) in departments" :key="index">
            <th scope="row">{{ department.id }}</th>
            <td>{{ department.name }}</td>
            <td>
              <router-link
                :to="{ name: 'DepartmentsEdit', params: { id: department.id } }"
                class="btn btn-outline-success px-5"
                >Edit</router-link
              >
              <button
                class="btn btn-outline-danger px-5"
                @click="deleteDepartment(department.id)"
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
      departments: [],
      showMessage: false,
      message: "",
      search: null,
    };
  },
  created() {
    this.getDepartments();
  },
  watch: {
    search() {
      this.getDepartments();
    },
  },
  methods: {
    getDepartments() {
      axios
        .get("/api/departments", {
          params: {
            search: this.search
          },
        })
        .then((res) => {
          this.departments = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteDepartment(id) {
      axios
        .delete("/api/departments/" + id)
        .then((res) => {
          this.getDepartments();
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