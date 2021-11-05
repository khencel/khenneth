<template>
<div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-end">
               <div class="col-md-3 ">
                   <select name="" class="form-control" v-model="userType" id="" @change="filter">
                       <option value="" disabled hidden>Select User Type</option>
                       <option value="all">All</option>
                       <option value="user">User</option>
                       <option value="admin">Admin</option>
                       <option value="consultant">Consultant</option>
                   </select>
               </div>
               <button class="button-success mr-2" @click="addUserModal">Add User</button>
           </div>
        </div>
    </div>
     <div class="card">
       <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Is Active</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" >
                        <td>
                            <span style="cursor:pointer" @click="isBan(user.id,user.isBan)">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24" title="deactivated">
                                    <path :fill="user.isBan==0?'green':'red'" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                </svg>
                            </span>
                        </td>
                        <td>{{user.firstname}}</td>
                        <td>{{user.lastname}}</td>
                        <td>{{user.country}}</td>
                        <td>
                            <span class="badge badge-success mr-2" v-for="(item, index) in user.roles" :key="index">
                                {{item.name}}
                            </span>
                        </td>
                        <td :class="user.is_subscriber?'text-success':'text-danger'" v-text="user.is_subscriber?'Subscriber':'Not Subscriber'"></td>
                        
                        <td class="text-right">
                            <button class="button-primary" @click="modalUser(user.id)">
                                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12A3,3 0 0,0 12,9M12,17A5,5 0 0,1 7,12A5,5 0 0,1 12,7A5,5 0 0,1 17,12A5,5 0 0,1 12,17M12,4.5C7,4.5 2.73,7.61 1,12C2.73,16.39 7,19.5 12,19.5C17,19.5 21.27,16.39 23,12C21.27,7.61 17,4.5 12,4.5Z" />
                                </svg>
                                View
                            </button>
                        </td>
                       
                    </tr>
                </tbody>
            </table>
            
       </div>

       <notifications group="notification" position="bottom right"/>

        <!-- modal -->
       <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-text="editMode?'Edit User':'Add User'"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="" v-show="!editMode">
                        <label for="firstname">Email Address</label>
                        <input type="email" v-model="form.email" class="form-control">
                        <span class="font-italic text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                    </div>
                    <div class="">
                        <label for="firstname">First Name</label>
                        <input type="text" v-model="form.firstname" class="form-control">
                        <span class="font-italic text-danger" v-if="errors.firstname" v-text="errors.firstname[0]"></span>
                    </div>

                    <div class="mt-1">
                        <label for="lastname">Last Name</label>
                        <input type="text" v-model="form.lastname" class="form-control">
                        <span class="font-italic text-danger" v-if="errors.lastname" v-text="errors.lastname[0]"></span>

                    </div>

                    <div class="mt-1">
                        <label for="address">Country</label>
                        <country-select class="form-control" v-model="form.country" :countryName="true" :country="form.country" topCountry="US" />
                        <span class="font-italic text-danger" v-if="errors.country" v-text="errors.country[0]"></span>
                    </div>

                    <div class="mt-1">
                        <label for="role">Role</label>
                        <div v-for="role in roles" :key="role.is"> 
                            <input type="checkbox" v-model="form.role" :value="role.id">{{role.name}}
                            <!-- <span class="font-italic text-danger" v-show="roleValidation">The email field is required.</span> -->
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <button :class="is_subsciber?'btn-danger':'btn-success'" class="btn w-100" @click="btnSubscribe" v-text="is_subsciber?'Unsubscibe this User':'Subscribe this User'"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" v-show="form.id != 1 && editMode" class="btn btn-secondary mr-auto" data-dismiss="modal" @click="btnDelete">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" v-show="form.is_admin != 1 && editMode" class="btn btn-primary" @click="btnUpdate">Save changes</button>
                    <button type="button" v-show="!editMode" class="btn btn-success" @click="addUser">Add User</button>
                </div>
                </div>
            </div>
        </div>
   </div>
</div>
  
</template>

<script>
    export default {
        data(){
            return{
                editMode: false,
                users:{},
                errors:{},
                roles:{},
                userType:'',
                filterUser:[],
                is_subsciber:'',
                form:new Form({
                    id:'',
                    firstname:'',
                    lastname:'',
                    country:'',
                    role:[],
                }),
            }
        },
        methods: {
           loadUser(){
               axios.get('/api/admin/user?api_token='+window.token)
               .then(response => {
                   this.users = response.data;
               });
           },

           modalUser(id){
               this.editMode = true;
               this.form.role = [];
               axios.get('/api/admin/show/'+id+"?api_token="+window.token)
               .then(response => {
                   this.form.id = response.data.user.id;
                   this.form.firstname = response.data.user.firstname;
                   this.form.lastname = response.data.user.lastname;
                   this.form.country = response.data.user.country;
                   this.roles = response.data.role
                   if(response.data.user.is_subscriber != null){
                       this.is_subsciber = true;
                   }else{
                       this.is_subsciber = false;
                   }
                   response.data.user.roles.forEach(element => {
                       this.form.role.push(element.id);
                   });
                   $('#userModal').modal('show');
               });
           },
            btnUpdate(){
                axios.put('/api/admin/update/'+this.form.id+'?api_token='+window.token,this.form)
                .then(response => {
                    this.form.role = [];
                    this.loadUser();
                    $('#userModal').modal('hide');
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Update User',
                        text: 'User record has been updated'
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
            },

            btnDelete(){
                axios.get('/api/admin/delete/'+this.form.id+'?api_token='+window.token)
                .then(response => {
                    this.loadUser();
                    $('#userModal').modal('hide');
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Delete User',
                        text: 'User has been deleted'
                    });
                });
            },
            addUserModal(){
                this.errors = [];
                this.editMode = false;
                this.form.role = [];
                this.form.firstname = "",
                this.form.lastname = "",
                this.form.country = "";
                 axios.get('/api/admin/role/?api_token='+window.token)
                 .then(response => {
                     this.roles = response.data;
                 });
                $('#userModal').modal('show');
            },
            addUser(){
            
                axios.post('/api/admin/store?api_token='+window.token,this.form)
                .then(response => {
                    this.loadUser();
                    $('#userModal').modal('hide');
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Add User',
                        text: 'New User has been Created'
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
            },
            filter(){
                this.filterUser = [];
                if(this.userType == "all"){
                    this.loadUser();
                }else{
                    axios.post('/api/admin/user/type?api_token='+window.token,{type:this.userType})
                    .then(response => {
                        this.users = response.data;
                        response.data.forEach(element => {
                            this.filterUser.push(element.user);
                        });
                        this.users = this.filterUser;
                    });
                }
            },

            isBan(id,status){
                this.$swal({
                title: 'Are you sure?',
                text: status==0?"You want to deactivate this user":"You want to activate this user",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: status==0?'Yes, deactivate this user!':'Yes, activate this user!'
                }).then((result) => {
                    if (result.value) {
                        this.$swal(
                        status==0?'Deactivated!':'Activated',
                        status==0?'This user has been Deactivated.':'This user has been Activated',
                        'success'
                        )
                    }
                })
            },

            btnSubscribe(){
                this.$swal({
                title: 'Are you sure?',
                text: "You want to change status this user",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {
                        
                        this.userStatusChange();
                    }
                })
            },

            userStatusChange(){
                axios.get('/api/user/change-status/'+this.form.id+'/?api_token='+window.token)
                .then(res => {
                    $('#userModal').modal('hide');
                    this.$swal(
                        "Status Change Success"
                    )
                    this.loadUser();
                });
            }
        },
        mounted() {
            this.loadUser();
        }
    }
</script>
