<style>
    .v-spinner{
        margin-top: 50px !important;
        text-align: right;
    }
</style>
<template>
   <div>
       <notifications group="notification" position="bottom right"/>
        <div class="form-group row">
            <label for="firstname" class="col-md-4 col-form-label">First Name</label>

            <div class="col-md-8">
                <input id="firstname" type="text" class="form-control" v-model="form.firstname"  required autocomplete="firstname" autofocus>
                <span class="text-danger font-italic" v-if="errors.firstname" v-text="errors.firstname[0]"></span>
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label">Last Name</label>

            <div class="col-md-8">
                <input id="lastname" type="text" class="form-control" v-model="form.lastname" required autocomplete="lastname" autofocus>
                 <span class="text-danger font-italic" v-if="errors.lastname" v-text="errors.lastname[0]"></span>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Date of Birth</label>

            <div class="col-md-8">
                <input type="date" v-model="form.birth_date" class="form-control">
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Time of Birth</label>

            <div class="col-md-8">
                <input type="time" v-model="form.birth_time" class="form-control">
                <span class="text-danger font-italic" v-if="errors.birth_time" v-text="errors.birth_time[0]"></span>

            </div>
        </div>

        <div class="form-group row">
            <label for="country" class="col-md-4 col-form-label">Country</label>

            <div class="col-md-8">
                <country-select class="form-control" v-model="form.country" :countryName="true" :country="form.country" topCountry="US" />
                 <span class="text-danger font-italic" v-if="errors.country" v-text="errors.country[0]"></span>
                
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label ">Email</label>

            <div class="col-md-8">
                <input id="email" type="email" class="form-control" v-model="form.email" required autocomplete="email">
                 <span class="text-danger font-italic" v-if="errors.email" v-text="errors.email[0]"></span>

            </div>
        </div>
        <div class="text-right"><small>Password must be at least 8 characters long, contain a number and an uppercase letter</small></div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label ">Password</label>

            <div class="col-md-8">
                <input id="password" type="password" v-model="form.password" class="form-control" required autocomplete="new-password">
                 <span class="text-danger font-italic" v-if="errors.password" v-text="errors.password[0]"></span>

            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label ">Confirm Password</label>

            <div class="col-md-8">
                <input id="password-confirm" type="password" v-model="form.password_confirmation" class="form-control" required autocomplete="new-password">
            </div>
        </div>
        <div class="text-right">
            <span v-show="isLoading"><RiseLoader></RiseLoader></span>
            <div v-show="!isLoading">
                <button class="button-success" @click="register">Register</button>
            </div>
        </div>
   </div>
</template>

<script>
    import RiseLoader from 'vue-spinner/src/RiseLoader.vue'
    import VueSweetalert2 from 'vue-sweetalert2';
    Vue.use(VueSweetalert2);
    export default {
        components: {
            RiseLoader
        },
        
        data(){
            return{
                errors:{},
                isLoading :false,
                form:new Form({
                    country: '',
                    firstname: '',
                    lastname: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    birth_date:'',
                    birth_time:''
                }), 
            }
        },
        methods:{
            register(){
                this.isLoading = true;
                axios.post('api/user/registration',this.form)
                .then(response => {
                    this.isLoading = false;
                    this.$swal({
                        icon: 'success',
                        title: 'You are now registered',
                        text: 'Please verify your account. Login to your email and click the validate account',
                    }).then((result) => {
                        window.location = "/login";
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    this.isLoading = false;
                });
            }
        },
        mounted() {
            
        }
    }
</script>
