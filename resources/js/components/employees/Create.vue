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
                        <form>
                            <div class="form-group row mb-3">
                                <label for="first_name"
                                    class="col-md-4 col-form-label text-md-right">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control" name="first_name"
                                     required autocomplete="first_name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="middle_name"
                                    class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                <div class="col-md-6">
                                    <input id="middle_name" type="text"
                                        class="form-control" name="middle_name"
                                     required autocomplete="middle_name" autofocus>
                                </div>
                            </div>

                             <div class="form-group row mb-3">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control" name="last_name"
                                     required autocomplete="last_name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control" name="address"
                                     required autocomplete="address" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country"
                                    class="col-md-4 col-form-label text-md-right">Country</label>

                                <div class="col-md-6">
                                    <select name="country" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                    </select>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="state"
                                    class="col-md-4 col-form-label text-md-right">State</label>

                                <div class="col-md-6">
                                    <select name="state" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="department"
                                    class="col-md-4 col-form-label text-md-right">Department</label>

                                <div class="col-md-6">
                                    <select name="department" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city"
                                    class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <select name="city" class="form-control" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="zip_code"
                                    class="col-md-4 col-form-label text-md-right">Zip code</label>

                                <div class="col-md-6">
                                    <input id="zip_code" type="text"
                                        class="form-control" name="zip_code"
                                     required autocomplete="zip_code" autofocus>
                                </div>
                            </div>
                            
                             <div class="form-group row mb-3">
                                <label for="birthdate"
                                    class="col-md-4 col-form-label text-md-right">Birthdate</label>

                                <div class="col-md-6">
                                   <datepicker input-class="form-control"></datepicker>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="date_hired"
                                    class="col-md-4 col-form-label text-md-right">Date Hired</label>

                                <div class="col-md-6">
                                   <datepicker input-class="form-control"></datepicker>
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
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
    Datepicker
  },
  data() {
      return {
          countries: [],
          states: [],
          cities: [],
          department: []
      }
  },
  created() {
      this.getCountries();
  },
  methods: {
      getCountries() {
        axios.get('api/employees/countries')
        .then(res => {
            this.countries = res;
            console.log(res);
        })
        .catch(err => {
            console.log(err);
        })
      }
  }
}
</script>

<style></style>