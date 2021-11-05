<template>
    <div class="container">
        
        <notifications group="notification" position="bottom right"/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center" :readonly="numb" type="text" v-model="form.numb1" maxlength="1">
                    </div>
                    <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center" :readonly="numb" type="text" v-model="form.numb2" maxlength="1">
                    </div>
                    <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center" :readonly="numb" type="text" v-model="form.numb3" maxlength="1">
                    </div>
                     <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center" :readonly="numb" type="text" v-model="form.numb4" maxlength="1">
                    </div>
                </div>
                <div v-show="!cast" class="w-100 text-center">
                    <span class="p-2 badge badge-success" @click="generateNumber">Generate random number</span>
                </div>
                <div class="mb-5" v-show="isLoading">
                    <span><RiseLoader></RiseLoader></span>
                </div>
                <div v-show="!isLoading" class="row mt-5">
                    <div class="col-md-4">
                        <span class="numb-format font-weight-bold">
                            {{oracle.number}}
                        </span>
                    </div>
                    <div class="col-md-8 pt-3">
                        <img :src="oracle.rating != null?'/img/rating/'+oracle.rating+'.png':''" class="img-fluid" alt="">
                    </div>
                    <div class="w-100 numb-format">
                        <span v-for="item in rating_labels" :key="item.rating" v-show="item.rating == oracle.rating">
                            {{item.label}}
                        </span>
                    </div>
                    <div>
                        <p class="meaning-format">
                            {{oracle.text}}
                        </p>
                    </div>
                </div>
                <div class="w-100 text-center mt-2">
                    <button v-show="!cast" class="btn button-success w-25" @click="generate">Submit</button>
                </div>
                <div v-show="journal && cast" class="w-100 text-center mt-2">
                    <button class="btn button-primary w-25" @click="saveJournal">Save Journal</button>
                </div>
            </div>
            <div v-show="diary" class="col-md-4">
                <div>
                    <label for="question">Question</label>
                </div>
                <div>
                    <input type="text" :readonly="question" placeholder="Question here..." class="form-control" v-model="form.question">
                </div>
                <div class="mt-2">
                    <label for="details">Details</label>
                </div>
                <div>
                    <textarea class="form-control" :readonly="details" placeholder="Details here..." name="" id="" cols="30" rows="10" v-model="form.details"></textarea>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RiseLoader from 'vue-spinner/src/RiseLoader.vue'
    export default {
        components: {
            RiseLoader
        },
        data(){
            return{
                isLoading:false,
                journal:false,
                diary:false,
                cast:false,
                oracle:{},
                rating_labels:[
                    {
                        rating:0,
                        label:"Difficult",
                    },
                    {
                        rating:1,
                        label:"Below Average",
                    },
                    {
                        rating:2,
                        label:"Average",
                    },
                    {
                        rating:3,
                        label:"Above Average",
                    },
                    {
                        rating:3.5,
                        label:"Good",
                    },
                    {
                        rating:4,
                        label:"Good",
                    },
                    {
                        rating:4.5,
                        label:"Good",
                    },
                    {
                        rating:5,
                        label:"Excellent",
                    },
                    
                ],
                numb:false,
                question:false,
                details:false,
                form:new Form({
                    numb1:null,
                    numb2:null,
                    numb3:null,
                    numb4:null,
                    oracle_number:null,
                    question:'',
                    details:'',
                })
            }
        },
        mounted() {

        },
        methods:{
            generateNumber(){
                this.form.numb1 = Math.floor(Math.random() * 10);
                this.form.numb2 = Math.floor(Math.random() * 10);
                this.form.numb3 = Math.floor(Math.random() * 10);
                this.form.numb4 = Math.floor(Math.random() * 10);
                this.form.oracle_number = ""+this.form.numb1+this.form.numb2+this.form.numb3+this.form.numb4;
            },
            generate(){
                this.isLoading = true;
                if(this.diary == false){
                    this.castOnly();
                }else{
                    this.castAsDiary();
                }
            },
            saveJournal(){
                this.form.post('/api/oracle/store?api_token='+window.token)
                .then(res => {
                    window.location = "/diaries"
                })
                .catch(error => {
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Details',
                        text: 'Question and Details are required'
                    });
                });
            },
            castAsDiary(){
                this.form.oracle_number = ""+this.form.numb1+this.form.numb2+this.form.numb3+this.form.numb4;
                if(this.form.numb1,this.form.numb2,this.form.numb3,this.form.numb4 == null || this.form.question == '' || this.form.details == ''){
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Input',
                        text: 'Oracle Number, Question and Details are required'
                    });
                }else{
                    this.form.post('/api/oracle/number?api_token='+window.token)
                    .then(res => {
                        this.oracle = res.data;
                        this.cast = true;
                        this.question = true;
                        this.details = true;
                        this.numb = true;
                        this.isLoading = false;
                    })
                }
            },
            castOnly(){
                this.form.oracle_number = ""+this.form.numb1+this.form.numb2+this.form.numb3+this.form.numb4;
                if(this.form.numb1,this.form.numb2,this.form.numb3,this.form.numb4 != null){
                    this.form.post('/api/oracle/number?api_token='+window.token)
                    .then(res => {
                        this.oracle = res.data;
                        this.isLoading = false;
                    })
                }else{
                    this.isLoading = false;
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Input',
                        text: 'Oracle Number, Question and Details are required'
                    });
                }
                    
            }
        }
    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    .numb-format{
        font-size: 60px;
        color: #FF3A18;
        font-family: 'Lobster', cursive;
    }

    .num-size{
        font-size: 80px;
    }

    .meaning-format{
        font-size: 19px;
        font-family: 'Lobster', cursive;
        color: gray;
        text-indent: 50px;
    }
    .v-spinner{
        text-align: center;
    }
</style>
