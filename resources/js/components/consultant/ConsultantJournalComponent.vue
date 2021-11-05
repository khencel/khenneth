<template>
   <div>
       <div v-show="Object.keys(customer_journal).length == 0" class="card p-2">
           <button class="button-primary" @click="createJournalOracle">Create Journal(Number or Word)</button>
           <button class="button-success mt-2" @click="createJournal">Create Journal(Trigram or Hexagram)</button>
       </div>
       <div class="card">
           
            <div class="row p-4">
                <div v-if="cast_type == 'Trigram'" class="col-md-7">
                    <div class="row justify-content-center" v-for="item in customer_journal" :key="item.id">
                       <div class="col-md-5 text-center">
                           <div v-for="(trigram, index) in item.trigram" :key="index">
                               <div v-for="trigram in  trigram.code" :key="trigram.id">
                                    <img v-show="trigram==1" style="width:90%;height:50px;"  src="/img/solidLine.png" alt="">
                                    <img v-show="trigram=='0'" style="width:90%;height:50px;"  src="/img/brokenLine.png" alt="">
                                </div>
                                <div>
                                    <strong>
                                        {{trigram.name}}
                                    </strong>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div v-else class="col-md-7">
                    <div v-show="Object.keys(customer_journal).length == 0">No record...</div>

                    <div class="row justify-content-center" v-for="(item, index) in customer_journal" :key="index">
                        <div class="col-md-5 text-center">
                            <div v-for="(hexagram, index) in  item.hex_focus" :key="index">
                                <img v-show="hexagram==1"    :class="index==4?'mb-3':''" style="width:90%;height:50px;"  src="/img/solidLine.png" alt="">
                                <img v-show="hexagram=='0'"  :class="index==4?'mb-3':''" style="width:90%;height:50px;"  src="/img/brokenLine.png" alt="">
                                <img v-show="hexagram == 3"  :class="index==4?'mb-3':''" src="/img/solidLinefocus.png" style="width:90%;height:50px" alt="">
                                <img v-show="hexagram == 4"  :class="index==4?'mb-3':''" src="/img/brokenCircle.png" style="width:90%;height:50px" alt="">
                            </div>
                            <div v-for="orig_hex in item.hex_original" :key="orig_hex.id">
                                <strong>{{orig_hex.name}}</strong>
                    
                                <p>{{orig_hex.meaning}}</p>
                            </div>
                            
                        </div>
                        <div class="col-md-1 text-center " style="height:310px;">
                            <div class="" style="position:absolute;top:48%">
                                <svg style="width:24px;height:24px;" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4,10V14H13L9.5,17.5L11.92,19.92L19.84,12L11.92,4.08L9.5,6.5L13,10H4Z" />
                                </svg>
                            </div>
                        </div>
                       
                        <div v-for="hex_transform in item.hex_transform" :key="hex_transform.id" class="col-md-5 text-center">
                            <div v-for="(transform_hex, index) in hex_transform.code" :key="index">
                                <img v-show="transform_hex==1"    :class="index==2?'mb-3':''" style="width:90%;height:50px;"  src="/img/solidLine.png" alt="">
                                <img v-show="transform_hex=='0'"  :class="index==2?'mb-3':''" style="width:90%;height:50px;"  src="/img/brokenLine.png" alt="">
                            </div>
                            <div>
                                <strong>{{hex_transform.name}}</strong>
                            </div>
                            <p>{{hex_transform.meaning}}</p>
                        </div>
                    </div>
                </div>
                <div v-for="item in customer_journal" :key="item.id" class="col-md-5">
                   
                    <div v-for="hex_transform in item.hex_transform" :key="hex_transform.id" class="position-relative">
                        
                        <img :src="'/storage/img/'+hex_transform.photo" class="img-fluid" alt="">
                        <div class="w-25 p-1" style="position:absolute;right:0;bottom:0;background-color:#CCCCCC">
                            <div>
                                <div class="text-center" v-for="(hex, index) in hex_transform.code" :key="index">
                                    <img v-show="hex==1"    :class="index==2?'mb-2':''" style="width:100%;height:25px;"  src="/img/solidLine.png" alt="">
                                    <img v-show="hex=='0'"  :class="index==2?'mb-2':''" style="width:100%;height:25px;"  src="/img/brokenLine.png" alt="">
                                </div>
                                <div class="text-center">
                                    {{hex_transform.name}}
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div v-for="(item, index) in customer_journal" :key="index">
                        <div>
                            <label for="">Question Type:</label>
                            {{item.attribute.attribute}}
                            
                        </div>
                        <div>
                            <label for="">Question:</label>
                            {{item.question}}
                        </div>
                        <div>
                            <label for="">Details:</label>
                            <p>{{item.details}}</p>
                        </div>
                        <div>
                            <label for="">Comment:</label>
                            <p v-if="item.comment == null">No comment...</p>
                            <p v-else>{{item.comment}}</p>
                        </div>
                    </div>
                </div>
                
            </div>
       </div>
       <NumberJournal ref="oracle"></NumberJournal>
       <div class="modal fade" id="journalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Journal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                <div class="row">
                        
                        <div class="col-md-7">
                            <div v-show="Object.keys(form.hex_code).length == 0 && Object.keys(form.tri_code).length == 0" class="border text-center" style="height:300px;background-color:#CCCCCC;">
                                <img src="/img/default.jpg" class="img-fluid" alt="">
                            </div>
                            <div v-show="Object.keys(form.hex_code).length != 0" class="row text-center" style="min-height:300px;">
                                <div class="col-md-5">
                                    <div  v-for="(item, index) in form.hex_code" :key="index">
                                        <img v-show="item == 1"  :class="index==2?'mb-3':''" src="/img/solidLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 0"  :class="index==2?'mb-3':''" src="/img/brokenLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 3"  :class="index==2?'mb-3':''" src="/img/solidLinefocus.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 4"  :class="index==2?'mb-3':''" src="/img/brokenCircle.png" style="width:80%;height:40px" alt="">
                                    </div>
                                    <strong>{{form.hex_name}}</strong>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, ut expedita? Tempora nulla voluptatem omnis consequatur nemo quibusdam blanditiis, adipisci atque. Saepe impedit quidem delectus sapiente odit quae optio nisi.</p>
                                </div>
                                <div class="col-md-1" style="padding-top:15%">
                                    <svg style="width:24px;height:24px;" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                                    </svg>
                                </div>
                                <div class="col-md-5">
                                    <div v-for="(item, index) in form.transforms" :key="index">
                                        <img v-show="item == 1"  :class="index==2?'mb-3':''" src="/img/solidLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 0"  :class="index==2?'mb-3':''" src="/img/brokenLine.png" style="width:80%;height:40px" alt="">
                                    </div>
                                    <strong>{{form.transform_name}}</strong>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam obcaecati, nam quod eos nobis minus ea hic dolorem quos id dicta dolores reprehenderit natus non, voluptatem mollitia animi? Blanditiis, cum.</p>
                                </div>
                            </div>
                            <div class="row justify-content-center text-center" style="min-height:300px;" v-show="Object.keys(form.tri_code).length != 0">
                                <div class="col-md-5">
                                    <div v-for="(item, index) in form.tri_code" :key="index">
                                        <img v-show="item == 1"  :class="index==2?'mb-3':''" src="/img/solidLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 0"  :class="index==2?'mb-3':''" src="/img/brokenLine.png" style="width:80%;height:40px" alt="">
                                    </div>
                                    <strong>{{form.tri_name}}</strong>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam obcaecati, nam quod eos nobis minus ea hic dolorem quos id dicta dolores reprehenderit natus non, voluptatem mollitia animi? Blanditiis, cum.</p>
                                </div>
                            </div>
                            <div class="row mt-2 text-center" v-show="Object.keys(form.hex_code).length == 0 && Object.keys(form.tri_code).length == 0">
                                <div class="col-md-6">
                                    <button :class="!trigramDisable?'button-primary w-75':'button-disable w-75 text-white'" :disabled="trigramDisable" @click="castValidation('trigram')">Trigram</button>
                                </div>
                                <div class="col-md-6">
                                    <button :class="!hexagramDisable?'button-primary w-75':'button-disable w-75 text-white'" :disabled="hexagramDisable" @click="castValidation('hexagram')">Hexagram</button>
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-5">
                            <div class="mb-2 row">
                                <div class="col-md-3">
                                    <label for="">Question Type</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-control" v-model="form.type" @change="propertiesSelected">
                                        <option value="" disabled hidden>Question Type</option>
                                        <option v-for="attribute in attributes" :key="attribute.id" :value="[attribute.id,attribute.is_hex]">{{attribute.attribute}}</option>
                                    </select>
                                    <span class="font-italic text-danger" v-if="errors.type" v-text="errors.type[0]"></span>
                                </div>
                                
                            </div>
                            <div class="mb-2 row">
                                <div class="col-md-3">
                                    <label for="">Question</label>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" v-model="form.question" placeholder="Question">
                                    <span class="font-italic text-danger" v-if="errors.question" v-text="errors.question[0]"></span>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <div class="col-md-3">
                                    <label for="">Detail</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea v-model="form.details" cols="30" rows="10" placeholder="Detail" class="form-control"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.details" v-text="errors.details[0]"></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div>
                        <textarea class="form-control" v-model="form.comment" placeholder="Comment here..." cols="30" rows="5"></textarea>
                    </div>
                    <div class="w-100 text-right">
                        <button class="button-success mr-auto mt-2 w-25" @click="btnSave">Save Journal</button>
                    </div>
                </div>

                </div>
            </div>
        </div>
       
        
        <notifications group="notification" position="bottom right"/>
       
       
   </div>
</template>

<script>
    import NumberJournal from '../modal/NumberJournal';
    export default {
        components:{
            NumberJournal
        },
        props:['user_id'],
        data(){
            return {
                attributes:{},
                cast_type:'',
                trigramDisable:false,
                hexagramDisable:false,
                journals:{},
                journal_details:{},
                errors:{},
                customer_journal:{},
                id:'',
                current:new Date(),
                form: new Form({
                    user_id: this.user_id,
                    type:'',
                    cast_type:'',
                    question:'',
                    question:'',
                    details:'',
                    comment:'',
                    hex_code:'',
                    hex_name:'',
                    transforms:'',
                    transform_name:'',
                    tri_code:'',
                    tri_name:'',
                    original_hex_id:'',
                    transform_hex_id:'',
                    trigram_id:'',
                    date:new Date().toDateString(),
                }),
            }
        },
        methods:{   
            loadAttribute(){
                axios.get('/api/user/attribute?api_token='+window.token)
                .then(response => {
                    this.attributes = response.data
                });
            },
            CustomerJournalList(){
                axios.get('/api/consultant/journal/'+this.user_id[0]+'/'+this.user_id[1]+'?api_token='+window.token)
                .then(response => {
                    this.customer_journal = response.data;
                    this.cast_type = this.cast_type!=""?response.data[0].cast_type:'';
                });
            },

            createJournal(){
                $('#journalModal').modal('show');
            },
        
            castHex(){
                this.form.cast_type = "Hexagram";
                axios.get('/api/user/cast?api_token=' +window.token)
                .then(response => {
                    this.form.original_hex_id = response.data.hexagram[0].id;
                    this.form.hex_name = response.data.hexagram[0].name;
                    
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
                    
                    this.form.hex_code = hex;
                    
                    var hexTransform = response.data.hexagram[0].code.split("");
                    
                    if(hexTransform[focus-1] == 0){
                        hexTransform[focus-1] = "1"
                    }else{
                        hexTransform[focus-1] = "0"
                    }
                    this.form.transforms = hexTransform;
                    this.getTransformname();
                });
            },
            getTransformname(){
                axios.post('/api/user/transform/name?api_token='+window.token,{transformName:this.form.transforms})
                .then(response => {
                    this.form.transform_hex_id = response.data.id;
                    this.form.transform_name = response.data.name;
                });
            },
            castTri(){
                this.form.cast_type = "Trigram";
                axios.get('/api/user/trigram?api_token='+window.token)
                .then(response => {
                    this.form.trigram_id = response.data[0].id;
                    this.form.tri_code = response.data[0].code.split("");
                    this.form.tri_name = response.data[0].name;
                });
            },
            castValidation(castType){
                if(this.form.type == "" || this.form.question == "" || this.form.details == ""){
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid details',
                        text: 'Question type, question, details are required'
                    });
                }else{
                    if(castType == 'hexagram'){
                        this.castHex();
                    }else{
                        this.castTri();
                    }
                }
            },
            btnSave(){
                if(this.form.cast_type == ""){
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Trigram or Hexagram',
                        text: 'Please click trigram or hexagram before you save'
                    });
                    
                }else{
                    this.form.post('/api/journal?api_token='+window.token)
                    .then(response =>{
                        this.$notify({
                            group: 'notification',
                            type: 'success',
                            title: 'Journal Created',
                            text: 'Journal has been Created'
                        });
                        $('#journalModal').modal('hide');
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
                }
            },

            displayDetails(id){
                this.form.get('/api/journal/'+id+"?api_token="+window.token)
                .then(response => {
                    this.journal_details = response.data;
                });
            },
            propertiesSelected(){
                if(this.form.type[1] == 1){
                    this.trigramDisable = true;
                    this.hexagramDisable = false;
                }else{
                    this.trigramDisable = false;
                    this.hexagramDisable = true;
                }
            },
            createJournalOracle(){
                this.$refs.oracle.showModal();
            }
        },
        mounted() {
            this.loadAttribute();
            this. CustomerJournalList();
        },
        
    }
</script>
