<template>
    <div>
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="row">
            <div class="col">
                <form>
                    <div class="form-row align-items-center">
                        <div class="col">
                            <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                placeholder="Jane Doe">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
        <router-link :to="{name: 'EmployeesCreate'}" class="btn btn-outline-success px-5">Create</router-link>
    </div>
    <div>
        <div class="alert alert-success">
        </div>
    </div>
    <div class='row'>
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
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</template>

<script>
export default {
}
</script>

<style></style>