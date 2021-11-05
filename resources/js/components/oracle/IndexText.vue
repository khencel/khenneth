<template>
    <div class="container">
        <notifications group="notification" position="bottom right"/>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center text-capitalize" :readonly="alreadyCast" pattern="[A-Za-z]{3}" maxlength="1" type="text" v-model="form.oracle_text[0]">
                    </div>
                    <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center text-capitalize" :readonly="alreadyCast" pattern="[A-Za-z]{3}" maxlength="1" type="text" v-model="form.oracle_text[1]">
                    </div>
                    <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center text-capitalize" :readonly="alreadyCast" pattern="[A-Za-z]{3}" maxlength="1" type="text" v-model="form.oracle_text[2]">
                    </div>
                     <div class="col-md-3 border p-1">
                        <input class="form-control num-size text-center text-capitalize" :readonly="alreadyCast" pattern="[A-Za-z]{3}" maxlength="1" type="text" v-model="form.oracle_text[3]">
                    </div>
                </div>
                <div class="row mt-5">
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
                <div v-show="!cast || !diary" class="w-100 text-center mt-2">
                    <button class="btn button-success w-25" @click="generate">Submit</button>
                </div>
                <div v-show="cast && diary" class="w-100 text-center mt-2">
                    <button class="btn button-primary w-25" @click="saveDiary">Save Journal</button>
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
    export default {
        data(){
            return{
                oracle:{},
                cast:false,
                diary:false,
                alreadyCast:false,
                question:false,
                details:false,
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
                form:new Form({
                    oracle_text:[],
                    question:'',
                    details:''
                })
            }
        },
        mounted() {
        },
        methods:{
            generate(){
                if(this.diary == false){
                    this.castOnly()
                }else{
                    this.castAsDiary();
                }
            },

            saveDiary(){
                this.form.post('/api/oracle/store-oracle-text?api_token='+window.token)
                .then(res => {
                    window.location = "/diaries"
                })
                .catch(error => {
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Input',
                        text: 'Oracle text, question and details are required'
                    });
                });
            },
            
            castOnly(){
                if(Object.keys(this.form.oracle_text).length == 4){
                    this.form.post('/api/oracle/text?api_token='+window.token)
                    .then(res => {
                        this.oracle = res.data;
                        this.cast = true;
                    })
                    .catch(error => {
                        this.$notify({
                            group: 'notification',
                            type: 'error',
                            title: 'Invalid Input',
                            text: 'Oracle text field must be character'
                        });
                    });
                }else{
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Input',
                        text: 'Oracle text, question and details are required'
                    });
                }
            },

            castAsDiary(){
                if(Object.keys(this.form.oracle_text).length == 4 && this.form.question != '' && this.form.details != ''){
                    this.form.post('/api/oracle/text?api_token='+window.token)
                    .then(res => {
                        this.alreadyCast = true;
                        this.question = true;
                        this.details = true;
                        this.oracle = res.data;
                        this.cast = true;
                    })
                    .catch(error => {
                        this.$notify({
                            group: 'notification',
                            type: 'error',
                            title: 'Invalid Input',
                            text: 'Oracle text field must be character'
                        });
                    });
                }else{
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Input',
                        text: 'Oracle text, question and details are required'
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
</style>
