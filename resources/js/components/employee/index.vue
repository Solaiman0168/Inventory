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
                            <router-link :to="{ name: 'edit-employee', params:{id:employee.id}}" class="btn btn-sm btn-primary">Edit</router-link>
                            <a href="#" @click="deleteEmployee(employee.id)" class="btn btn-sm btn-danger">Delete</a>
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
           },
            deleteEmployee(id){
                // console.log(id)
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.value) {
                    axios.delete('/api/employee/'+id)
                    .then(() => {
                      this.employees = this.employees.filter(employee => {
                        return employee.id != id
                      })
                    })
                    .catch(() => {
                      this.$router.push({ name: 'employee'})
                    })
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  }
                })
            },


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
