<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <router-link to="/store-employee" class="btn btn-primary" style="width: 140px;">Add Employee</router-link>
                 <br>
                    <input type="text" class="form-controll mt-3" v-model="searchTerm" name="" id="employee-search" placeholder="Search Here">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card mt-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Employee List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Sallery</th>
                        <th>Joining_date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="employee in filterSearch" :key="employee.id">
                        <td>{{ employee.name }}</td>
                        <td><img :src="employee.photo" id="employee_photo"></td>
                        <td>{{ employee.phone }}</td>
                        <td>{{ employee.sallery }}</td>
                        <td>{{ employee.joining_date }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
    </div>
</template>

<script>
import axios from 'axios'


  export default{
      created(){
        if(!User.loggedIn()){
          this.$router.push({ name : '/'})
        }
      },

      data(){
        return{
            employees: [],
            searchTerm: ''
          }
        },
        computed:{
            filterSearch(){
                // alert('ok')
                return this.employees.filter(employee => {
                    return employee.phone.match(this.searchTerm)
                })
            }
        },
        methods:{
           allEmployee(){
            axios.get('api/employee/')
            .then(({data}) => (this.employees = data))
            .catch()
           }
        },
        created(){
            this.allEmployee();
        }
    }
</script>

<style>
    #employee_photo{
        width: 40px;
        height: 40px;
    }
    #employee-search{
        width: 300px;
    }
</style>
