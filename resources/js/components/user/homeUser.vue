<style scoped>
    .v-spinner{
        text-align: center;
    }

    .font-format{
        font-family: 'Lobster', cursive;
    }

@media only screen and (max-width: 750px) {
    .hex-img{
        margin-bottom: 5px !important;
    }
}
</style>
<template>
<div>
    <div class="row justify-content-center">
        <div class="col-3">
            <img class="img-fluid" src="img/Home_logo.png" alt="">
        </div>
    </div>
    <div class="text-center mt-2">
        <span class="font-format"><h1>{{type}}</h1></span>
    </div>
    <div class="" v-show="isLoading" style="height:300px;">
        <span><RiseLoader></RiseLoader></span>
    </div>
    <div  class="row justify-content-center">
        <div class="col-md-3 col-9">
            <div class="text-center" v-for="(result, index) in results" :key="index">
                <img :class="index==2?'mb-4 w-100 hex-img':'mb-1 w-100 hex-img'" style="height:50px" v-show="result == 1" src="img/solidLine.png"  alt="">
                <img :class="index==2?'mb-4 w-100':'mb-1 w-100'" style="height:50px" v-show="result == 0" src="img/brokenLine.png" alt="">
                <img :class="index==2?'mb-4 w-100':'mb-1 w-100'" style="height:50px" v-show="result == 4" src="img/brokenCircle.png" alt="">
                <img :class="index==2?'mb-4 w-100':'mb-1 w-100'" style="height:50px" v-show="result == 3" src="img/solidLinefocus.png" alt="">
            </div>
            <div class="text-center">
                <h1>{{name}}</h1>
                <p>{{meaning}}</p>
            </div>
        </div>

        <div v-show="subscriber && isCast && !isLoading && type != 'Trigram'" class="col-md-1 p-0 position-relative col-4" style="max-height:350px;">
            <div class=" position-absolute" style="height:100px;top:50%;margin-top:-50px;">
                <svg class="d-sm-none d-md-block d-none mx-auto" style="width:100%;" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4,15V9H12V4.16L19.84,12L12,19.84V15H4Z" />
                </svg>
            </div>
            
            <svg class="d-block d-none d-sm-block d-md-none mx-auto" style="width:60%;" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9,4H15V12H19.84L12,19.84L4.16,12H9V4Z" />
            </svg>
        </div>

        <div v-show="subscriber && isCast && type != 'Trigram'" class="col-md-3 col-9 text-center">
            <div class="mt-4">
                <h1>{{transformName}}</h1>
                <p>{{transformMeaning}}</p>
            </div>
        </div>

        <div v-show="isCast && !isLoading && type != 'Trigram'" class="col-md-1 p-0 position-relative col-4" style="max-height:350px;">
            <div class=" position-absolute" style="height:100px;top:50%;margin-top:-50px;">
                <svg class="d-sm-none d-md-block d-none mx-auto" style="width:100%;" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4,15V9H12V4.16L19.84,12L12,19.84V15H4Z" />
                </svg>
            </div>
            
            <svg class="d-block d-none d-sm-block d-md-none mx-auto" style="width:60%;" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9,4H15V12H19.84L12,19.84L4.16,12H9V4Z" />
            </svg>
        </div>

        <div v-show="subscriber && type != 'Trigram'" class="col-md-3 col-9">
            <div class="text-center" v-for="(transform, index) in transforms" :key="index">
                <img :class="index==2?'mb-4 w-100':'mb-1 w-100'" style="height:50px" v-show="transform == 1" src="img/solidLine.png"  alt="">
                <img :class="index==2?'mb-4 w-100':'mb-1 w-100'" style="height:50px" v-show="transform == 0" src="img/brokenLine.png" alt="">
            </div>
        </div>

        <div v-show="isCast && !subscriber && !isLoading && type != 'Trigram'" class="col-md-3 col-9 text-center position-relative">
            <div class="text-center" v-for="(item,index) in 6" :key="item">
                <img :class="index==2?'mb-4 w-100':'mb-1 w-100'" style="height:50px;opacity:0.1" src="img/solidLine.png"  alt="">
            </div>
            
            <div style="height:200px;position:absolute;top:0;bottom:0; top: 30%;left: 50%;-ms-transform: translate(-50%, -50%);transform: translate(-50%, -50%);">
                <img src="img/password.png" alt="" style="width:100%">
            </div>
            <div>
                <button class="button-primary mt-2 mb-5" @click="btnSubscribe">SUBSCRIBE NOW</button>
            </div>
        </div>
    </div>
    <div v-show="type == 'Trigram' && isCast == true && subscriber">
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <td class="font-weight-bold">Nature</td>
                    <td>
                        <span v-for="(item, index) in trigram.nature_trigram" :key="index">
                            {{item.nature_id}},
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Element</td>
                    <td>
                        {{trigram.element}}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Number</td>
                    <td>
                        {{trigram.number}}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">People</td>
                    <td>
                        <span v-for="(item, index) in trigram.tri_people" :key="index">
                            {{item.people_id}},
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Body Part</td>
                    <td>
                        <span v-for="(item, index) in trigram.tri_body_part" :key="index">
                            {{item.body_part_id}},
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Animal</td>
                    <td>
                        <span v-for="(item, index) in trigram.tri_animal" :key="index">
                            {{item.animal_id}},
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Sickness</td>
                    <td>
                        <span v-for="(item, index) in trigram.tri_sickness" :key="index">
                            {{item.sickness_id}},
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Color</td>
                    <td>
                        <span v-for="(item, index) in trigram.tri_color" :key="index">
                            {{item.color_id}},
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Shape</td>
                    <td>
                        {{trigram.shape}}
                    </td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Direction</td>
                    <td>
                        {{trigram.direction}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-show="isCast && !isLoading && type != 'Trigram' && subscriber" >
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <td class="font-weight-bold">General Luck</td>
                    <td>{{gen_luck}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Health</td>
                    <td>{{health}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Relationships</td>
                    <td>{{relationships}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Career & Wealth</td>
                    <td>{{career_wealth}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Expectant Mothers</td>
                    <td>{{expectant_mothers}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Examinations</td>
                    <td>{{examinations}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Lost Property</td>
                    <td>{{lost_property}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Missing Persons</td>
                    <td>{{missing_persons}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Travel</td>
                    <td>{{travel}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Legal Matters</td>
                    <td>{{legal_matters}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Weather</td>
                    <td>{{weather}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Overall Forecast</td>
                    <td>{{overall_forecast}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center p-2">
        <div class="font-format border-2 m-auto background-primary text-white p-3" style="border-radius:50%;cursor:pointer;width:80px;border:solid 1px" @click="btnCast">Cast Now</div>
    </div>
    <div class="row">
        <div class="col-6 text-center">
            <button :class="type!='Trigram'?'button-success font-format w-50':'button-success font-format w-50 bg-dark'" @click="btnCastType('tri')">Trigrams</button>
        </div>
        <div class="col-6 text-center">
            <button :class="type!='Hexagram'?'button-success font-format w-50':'button-success font-format w-50 bg-dark'" @click="btnCastType('hex')">Hexagrams</button>
        </div>
    </div>
    <div class="mt-5" style="font-size:30px;">
        <p>
            “If you need further assistance regarding the result of your Yijing Divination please book a consult with us and one of our consultants will be glad to help further”
        </p>
    </div>
    <div class="text-center">
        <a href="/book" class="btn btn-success">SCHEDULE A CONSULT</a>
    </div>
    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class=" p-2"><h3>Premium</h3></div>
                <div class="p-2">
                    <ul>
                        <li>Personalized Divination Diary</li>
                        <li>Professional Hexagram Transformation</li>
                        <li>Oracle Number Divination</li>
                        <li>Oracle Text Divination</li>
                        <li>Plumblossom Divination</li>
                    </ul>
                </div>
                <div class="pl-2" >
                    <span class="font-weight-bold">$</span>
                    <span class="font-weight-bold" style="font-size:25px;">69.99/</span>
                    <span><strong>year</strong></span>
                </div>
                <div id="paypal-button-container"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
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
                isLoading :false,
                isActive:false,
                type:'',
                results:'',
                transforms:'',
                name:'',
                meaning:'',
                transformName:'',
                transformMeaning:'',
                gen_luck:'',
                health:'',
                relationships:'',
                career_wealth:'',
                expectant_mothers:'',
                examinations:'',
                lost_property:'',
                missing_persons:'',
                travel:'',
                legal_matters:'',
                weather:'',
                overall_forecast:'',
                subscriber: false,
                isCast: false,
                focus:null,
                original_gua:null,
                trigram:{}
            }
        },
        methods:{
            btnCastType(castType){
                this.isCast = false;
                this.results = "";
                this.transforms = "";
                this.name = "";
                this.meaning = "";
                this.transformName = "";
                this.transformMeaning = "";
                this.subscriber = false;
                if(castType == "hex"){
                    this.type = "Hexagram"
                }else{
                    this.type = "Trigram"
                }
            },

            btnCast(){
                this.results = "";
                this.name = "";
                this.meaning = "",
                this.transforms = "";
                this.transformName = "";
                this.isLoading = true;
                this.subscriber = false;
                if(this.type == "Hexagram"){
                    axios.get('/api/user/cast?api_token=' +window.token)
                    .then(response => {
                        this.subscriber = true;
                        if(response.data.user == null){
                            this.subscriber = false;
                            this.results = response.data.hexagram[0].code.split("");
                            this.name = response.data.hexagram[0].name;
                            this.meaning = response.data.hexagram[0].meaning;
                            this.isLoading = false;
                            this.isCast = true;
                        }else{
                            this.isCast = true;
                            this.subscriber = true;
                             function getRandomInt(max) {
                                return Math.floor(Math.random() * Math.floor(max));
                            }
                            var hex = response.data.hexagram[0].code.split("");
                            var focus = getRandomInt(6);

                            if(focus == 0){
                                focus = 1;
                            }
            
                            if(hex[focus-1] == 1){
                                hex[focus-1] = 3;
                            }else{
                                hex[focus-1] = 4;
                            }
                            this.focus = focus;

                            this.name = response.data.hexagram[0].name;
                            this.meaning = response.data.hexagram[0].meaning;
                            this.results = hex;
                            this.original_gua = response.data.hexagram[0].id;

                            var hexTransform = response.data.hexagram[0].code.split("");

                            if(hexTransform[focus-1] == 0){
                                hexTransform[focus-1] = "1"
                            }else{
                                hexTransform[focus-1] = "0"
                            }
                            this.transforms = hexTransform;
                            this.getTransformname();
                            this.isLoading = false;
                        }                                                
                    });
                }

                if(this.type == "Trigram"){
                    this.isLoading = true;
                    this.subscriber = true;
                    axios.get('api/user/trigram?api_token='+window.token)
                    .then(response => {
                        this.results = response.data.tri.code.split("");
                        this.name = response.data.tri.name;
                        if(response.data.user == null){
                            this.subscriber = false;
                            
                        }
                        this.trigram = response.data.tri;
                        this.isLoading = false;
                        this.isCast = true;
                    });
                    
                }

                if(this.type == ""){
                    this.type = "Please Select at least one"
                    this.isLoading = false;
                }
            },

            // btnSubscribe(){
            //     axios.get('/api/user/subscribe?api_token='+window.token)
            //     .then(response => {
            //     });
            // },

            getTransformname(){
                axios.post('api/user/transform/name?api_token='+window.token,{transformName:this.transforms,focus:this.focus,gua:this.original_gua})
                .then(response => {
                    console.log(response.data);
                    this.transformName = response.data.name.name;
                    this.transformMeaning = response.data.meaning.yao_text;
                    this.gen_luck = response.data.meaning.gen_luck;
                    this.health = response.data.meaning.health;
                    this.relationships = response.data.meaning.relationships;
                    this.career_wealth = response.data.meaning.career_wealth;
                    this.expectant_mothers = response.data.meaning.expectant_mothers;
                    this.examinations = response.data.meaning.examinations;
                    this.lost_property = response.data.meaning.lost_property;
                    this.missing_persons = response.data.meaning.missing_persons;
                    this.travel = response.data.meaning.travel;
                    this.legal_matters = response.data.meaning.legal_matters;
                    this.weather = response.data.meaning.weather;
                    this.overall_forecast = response.data.meaning.overall_forecast;
                });
            },

            btnSubscribe(){
                $('#paymentModal').modal('show');
            },

            paypal(){
                paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                    purchase_units: [{
                        amount: {
                        value: '69.99'
                        }
                    }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    // alert('Transaction completed by ' + details.payer.name.given_name);
                        axios.get('api/user/payment?api_token='+window.token)
                        .then(response => {
                            $('#paymentModal').modal('hide');
                            window.location = "/home";
                        });
                    });
                    
                }
                }).render('#paypal-button-container');
                //This function displays Smart Payment Buttons on your web page.
            },
        },
        mounted() {
            this.paypal();
        }
    }
</script>
