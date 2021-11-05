<style scoped>
    .v-spinner{
        float:right
    }
</style>
<template>
<div>
<div class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-md-8">
        
        <div class="card">
            <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        <notifications group="notification" position="bottom right"/>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">Firstname</label>
                                <input :readonly="!isEdit" type="text" class="form-control" v-model="form.firstname">
                                <span class="font-italic text-danger" v-if="errors.firstname" v-text="errors.firstname[0]"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">Lastname</label>
                                <input :readonly="!isEdit" type="text" class="form-control" v-model="form.lastname">
                                <span class="font-italic text-danger" v-if="errors.lastname" v-text="errors.lastname[0]"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="firstname">Country</label>
                                <country-select :disabled="!isEdit" class="form-control" v-model="form.country" :countryName="true" :country="form.country" topCountry="US" />
                                <span class="font-italic text-danger" v-if="errors.country" v-text="errors.country[0]"></span>

                            </div>
                            <div class="col-md-6">
                                <label for="firstname">Email Address</label>
                                <input :readonly="!isEdit" type="text" class="form-control" v-model="form.email">
                                <span class="font-italic text-danger" v-if="errors.email" v-text="errors.email[0]"></span>
                            </div>
                        </div>
                        <div class="mt-5 mb-5 text-right">
                            <span v-show="isLoading"><loader></loader></span>
                            <button v-show="!isLoading & isEdit" class="btn btn-success" @click="update">Update</button>
                            <button v-show="!isEdit" class="btn btn-primary" @click="editMode">Edit Profile</button>
                        </div>
                        <hr>
                        <h4>Change Password</h4>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" v-model="changePass.password" autocomplete="new-password">
                            <span class="font-italic text-danger" v-if="errors.password" v-text="errors.password[0]"></span>
                        </div>

                        <div>
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" v-model="changePass.newPassword">
                            <span class="font-italic text-danger" v-if="errors.newPassword" v-text="errors.newPassword[0]"></span>
                        </div>

                        <div>
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" v-model="changePass.newPassword_confirmation">
                        </div>
                        <button class="btn btn-success mt-2 float-right" @click="changePassword">Change Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
    export default {
        data(){
            
            return {
                isLoading:false,
                isEdit:false,
                errors:{},
                form: new Form({
                    firstname: '',
                    lastname:'',
                    country:'',
                    email:'',
                }),

                changePass: new Form({
                    password:'',
                    newPassword:''
                }),
            }
        },
        methods:{
            loadProfile(){
                axios.get('api/user/profile?api_token='+window.token)
                .then(response => {
                    this.form.firstname = response.data.firstname;
                    this.form.lastname = response.data.lastname;
                    this.form.country = response.data.country;
                    this.form.email = response.data.email;
                });
            },

            editMode(){
                this.isEdit = true;
            },

            update(){
                this.isLoading = true;
                axios.put('api/user/profile/update/'+this.$userId+"?api_token="+window.token,this.form)
                .then(response => {
                    this.isLoading = false;
                    this.isEdit = false;
                    $('#hexagramModal').modal('hide');
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Update Profile',
                        text: 'Your record has been updated'
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.isLoading = false;
                });
            },

            changePassword(){
                axios.post('api/user/profile/changePassword?api_token='+window.token,this.changePass)
                .then(response => {
                    this.errors = [];
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Update Password',
                        text: 'Your Password has been updated'
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
            }
        },
        mounted() {
            this.loadProfile();
            
        }
    }
</script>
