<template>
   <div>
        <div class="text-right mb-3">
           <button class="button-primary" @click="btnCreate">Create Diary(Trigram or Hexagram)</button>
           <button class="button-success" @click="oracleNumber">Create Oracle(Number or Text)</button>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="diary-tab" data-toggle="tab" href="#diary" role="tab" aria-controls="diary" aria-selected="true">My Diary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="consultant-tab" data-toggle="tab" href="#consultant" role="tab" aria-controls="consultant" aria-selected="false">My Consultant Diary</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="consultant-tab" data-toggle="tab" href="#oracleNumber" role="tab" aria-controls="consultant" aria-selected="false">Oracle Number</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="consultant-tab" data-toggle="tab" href="#oracleText" role="tab" aria-controls="consultant" aria-selected="false">Oracle Text</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="diary" role="tabpanel" aria-labelledby="diary-tab">
                <div class="row mt-1">
                    <div class="col-md-2" style="max-height:500px;overflow:auto">
                        
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                            <a v-for="(journal, index) in journals" :key="journal.id" :class="index==0?'nav-link side-tab border active':'nav-link side-tab border'" @click="displayDetails(journal.attribute.id)" :id="'v-pills-'+journal.attribute.attribute+'-tab'" data-toggle="pill" :href="'#v-pills-'+journal.attribute.attribute" role="tab" :aria-controls="'v-pills-'+journal.attribute.attribute" aria-selected="true">    
                            {{journal.attribute.attribute}}     
                            </a>
                        </div>
                    
                    </div>
                    <div class="col-md-10 shadow-sm p-3">
                        <div v-if="Object.keys(journal_details).length == 0">No record...</div>
                        <div v-else class="" v-for="(item, index) in journal_details" :key="index">
                            <div class="row">
                                <div class="col-md-7 border">
                                    <h4>{{item.cast_type}}</h4>
                                    <div v-if="item.hex_focus != ''" class="row text-center">
                                        <div class="col-md-5">
                                            <div v-for="(item, index) in item.hex_focus.split('')" :key="index">
                                                <img v-show="item == 1"  :class="index==4?'mb-3':''" src="img/solidLine.png" style="width:90%;height:40px" alt="">
                                                <img v-show="item == '0'"  :class="index==4?'mb-3':''" src="img/brokenLine.png" style="width:90%;height:40px" alt="">
                                                <img v-show="item == 3"  :class="index==4?'mb-3':''" src="img/solidLinefocus.png" style="width:90%;height:40px" alt="">
                                                <img v-show="item == 4"  :class="index==4?'mb-3':''" src="img/brokenCircle.png" style="width:90%;height:40px" alt="">
                                            </div>
                                            <strong>{{item.hex_original[0].name}}</strong>
                                        </div>
                                        <div class="col-md-1">
                                            =>
                                        </div>
                                        <div class="col-md-5">
                                            <div v-for="(item, index) in item.hex_transform[0].code.split('')" :key="index">
                                                <img v-show="item == 1"  :class="index==2?'mb-3':''" src="img/solidLine.png" style="width:90%;height:40px" alt="">
                                                <img v-show="item == '0'"  :class="index==2?'mb-3':''" src="img/brokenLine.png" style="width:90%;height:40px" alt="">
                                            </div>
                                            <strong>{{item.hex_transform[0].name}}</strong>
                                        </div>
                                    </div>
                                    <div v-else class="row text-center justify-content-center">
                                        <div class="col-md-5">
                                            <div v-for="(item, index) in item.trigram[0].code.split('')" :key="index">
                                                <img v-show="item == 1"  :class="index==2?'mb-3':''" src="img/solidLine.png" style="width:90%;height:40px" alt="">
                                                <img v-show="item == '0'"  :class="index==2?'mb-3':''" src="img/brokenLine.png" style="width:90%;height:40px" alt="">
                                            </div>
                                            <strong>{{item.trigram[0].name}}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div>
                                        <strong>Rating:</strong>
                                        
                                        <span v-for="properties in item.hex_original" :key="properties.id">
                                            <span v-show="item.type == 1">
                                                <span v-for="active in properties.opening[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.opening[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                
                                            </span>
                                            <span v-show="item.type == 2">
                                                <span v-for="active in properties.nobleman[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.nobleman[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 3">
                                                <span v-for="active in properties.weather[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.weather[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 4">
                                                <span v-for="active in properties.luck[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.luck[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 5">
                                                <span v-for="active in properties.wealth[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.wealth[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 6">
                                                <span v-for="active in properties.relationship[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.relationship[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 7">
                                                <span v-for="active in properties.business[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.business[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 8">
                                                <span v-for="active in properties.family[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.family[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 9">
                                                <span v-for="active in properties.legal[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.legal[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 10">
                                                <span v-for="active in properties.examination[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.examination[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 11">
                                                <span v-for="active in properties.travel[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.travel[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 12">
                                                <span v-for="active in properties.health[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.health[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>

                                            <span v-show="item.type == 13">
                                                <span v-for="active in properties.properties[0].rating/20" :key="active.id">
                                                    <img src="/img/active-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                                <span v-for="notActive in (5 - properties.properties[0].rating/20)" :key="notActive.id">
                                                    <img src="/img/not-rate.png" class="mr-1" style="width:25px;" alt="">
                                                </span>
                                            </span>
                        
                                        </span>
                                    </div>
                                    <div>
                                         <p><strong>{{item.cast_type}} meaning</strong></p>
                                        <div v-for="meaning in item.hex_original" :key="meaning.id">
                                            <p>{{meaning.meaning}}</p>
                                        </div>     
                                    </div>                   
                                </div>
                            </div>
                            <p><strong>Date:</strong>{{item.date}}</p>
                            <p><strong>Question:</strong>{{item.question}}</p>
                            <strong>Details</strong>
                            <p>{{item.details}}</p>
                            <hr>
                        </div>

                        
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="consultant" role="tabpanel" aria-labelledby="consultant-tab">
                <div class="border p-2" v-for="diary in consultant_user" :key="diary.id">
                    <h4>{{diary.cast_type}}</h4>
                    <div class="row mt-2">
                        <div class="col-md-7">
                            <div v-if="diary.cast_type == 'Hexagram'" class="row justify-content-center">
                                <div class="col-md-5 text-center">
                                    <div v-for="(hex,index) in diary.hex_focus" :key="index">
                                            <img v-show="hex == 1"  :class="index==4?'mb-3':''" src="img/solidLine.png" style="width:90%;height:40px" alt="">
                                            <img v-show="hex == '0'"  :class="index==4?'mb-3':''" src="img/brokenLine.png" style="width:90%;height:40px" alt="">
                                            <img v-show="hex == 3"  :class="index==4?'mb-3':''" src="img/solidLinefocus.png" style="width:90%;height:40px" alt="">
                                            <img v-show="hex == 4"  :class="index==4?'mb-3':''" src="img/brokenCircle.png" style="width:90%;height:40px" alt="">
                                    </div>
                                    <span v-for="original_hex in diary.hex_original" :key="original_hex.id" >
                                        <strong>{{original_hex.name}}</strong>
                                        <p>{{original_hex.meaning}}</p>
                                    </span>
                                </div>
                                <div class="col-md-1 text-center p-0">
                                    <svg style="width:24px;height:24px;" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                                    </svg>
                                </div>
                                <div class="col-md-5 text-center">
                                    <div v-for="transform_hex in diary.hex_transform" :key="transform_hex.id">
                                        <div v-for="(code, index) in transform_hex.code" :key="code.id">
                                            <img v-show="code == 1"  :class="index==2?'mb-3':''" src="img/solidLine.png" style="width:90%;height:40px" alt="">
                                            <img v-show="code == '0'"  :class="index==2?'mb-3':''" src="img/brokenLine.png" style="width:90%;height:40px" alt="">
                                        </div>
                                        <strong>{{transform_hex.name}}</strong>
                                        <p>{{transform_hex.meaning}}</p>
                                    </div>

                                </div>
                            </div>
                            <div v-else class="row justify-content-center">
                                <div class="col-md-5 text-center">
                                    <div v-for="trigram in diary.trigram" :key="trigram.id">
                                        <div v-for="(trigram_code, index) in trigram.code" :key="trigram_code.id">
                                            <img v-show="trigram_code == 1"  :class="index==2?'mb-3':''" src="img/solidLine.png" style="width:90%;height:40px" alt="">
                                            <img v-show="trigram_code == '0'"  :class="index==2?'mb-3':''" src="img/brokenLine.png" style="width:90%;height:40px" alt="">
                                        </div>
                                        <strong>{{trigram.name}}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="position-relative" v-for="transform in diary.hex_transform" :key="transform.id">
                                <img :src="'storage/img/'+transform.photo" class="img-fluid" alt="">
                                <div class=" text-center position-absolute" style="bottom:0;right:0;width:30%;background-color:#CCCCCC">
                                    <div v-for="(code, index) in transform.code" :key="code.id">
                                        <img v-show="code == 1"  :class="index==2?'mb-1':''" src="img/solidLine.png" style="width:90%;height:20px" alt="">
                                        <img v-show="code == '0'"  :class="index==2?'mb-1':''" src="img/brokenLine.png" style="width:90%;height:20px" alt="">
                                    </div>
                                    <strong>{{transform.name}}</strong>
                                </div>
                            </div>
                            <div>
                                <strong>Question Type:</strong> {{diary.attribute.attribute}}
                            </div>
                            <div>
                                <strong>Question:</strong> {{diary.question}}
                            </div>
                            <div>
                                <strong>Details:</strong>
                                <p>{{diary.details}}</p>
                            </div>
                            <div>
                                <strong>Comment:</strong>
                                <p v-text="diary.comment == null?'No comment...':diary.comment" ></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="oracleNumber" role="tabpanel" aria-labelledby="consultant-tab">
                <JournalOracleNumb ref="oracle-number"></JournalOracleNumb>
            </div>
            <div class="tab-pane fade " id="oracleText" role="tabpanel" aria-labelledby="consultant-tab">
                <JournalOracleText ref="oracle-text"></JournalOracleText>
            </div>
        </div>
        
        <notifications group="notification" position="bottom right"/>
        <!-- modal -->
        <div class="modal fade" id="createDiaryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">My Hexagram Companion Journal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div v-show="Object.keys(form.hex_code).length == 0 && Object.keys(form.tri_code).length == 0" class="border text-center" style="height:300px;background-color:#CCCCCC;">
                                <img src="img/default.jpg" class="img-fluid" alt="">
                            </div>
                            <div v-show="Object.keys(form.hex_code).length != 0" class="row text-center" style="min-height:300px;">
                                <div class="col-md-5">
                                    <div  v-for="(item, index) in form.hex_code" :key="index">
                                        <img v-show="item == 1"  :class="index==2?'mb-3':''" src="img/solidLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 0"  :class="index==2?'mb-3':''" src="img/brokenLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 3"  :class="index==2?'mb-3':''" src="img/solidLinefocus.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 4"  :class="index==2?'mb-3':''" src="img/brokenCircle.png" style="width:80%;height:40px" alt="">
                                    </div>
                                    <strong>{{form.hex_name}}</strong>
                                    <p>
                                        {{form.meaning}}
                                    </p>
                                </div>
                                <div class="col-md-1" style="padding-top:15%">
                                    <svg style="width:24px;height:24px;" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                                    </svg>
                                </div>
                                <div class="col-md-5">
                                    <div v-for="(item, index) in form.transforms" :key="index">
                                        <img v-show="item == 1"  :class="index==2?'mb-3':''" src="img/solidLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 0"  :class="index==2?'mb-3':''" src="img/brokenLine.png" style="width:80%;height:40px" alt="">
                                    </div>
                                    <strong>{{form.transform_name}}</strong>
                                    <p>
                                        {{form.transMeaning}}
                                    </p>
                                </div>
                            </div>
                            <div class="row justify-content-center text-center" style="min-height:300px;" v-show="Object.keys(form.tri_code).length != 0">
                                <div class="col-md-5">
                                    <div v-for="(item, index) in form.tri_code" :key="index">
                                        <img v-show="item == 1"  :class="index==2?'mb-3':''" src="img/solidLine.png" style="width:80%;height:40px" alt="">
                                        <img v-show="item == 0"  :class="index==2?'mb-3':''" src="img/brokenLine.png" style="width:80%;height:40px" alt="">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="button-success" @click="btnSave">Save</button>
                </div>
                </div>
            </div>
        </div>
        <OracleNumber ref="oracleNumber"></OracleNumber>
   </div>
</template>

<script>
    import OracleNumber from '../modal/NumberJournal';
    import JournalOracleNumb from '../diaries/UserOracleNumber';
    import JournalOracleText from '../diaries/UserOracleText';
    export default {
        components:{
            OracleNumber,
            JournalOracleNumb,
            JournalOracleText
        },
        data(){
            return {
                attributes:{},
                trigramDisable:false,
                hexagramDisable:false,
                journals:{},
                journal_details:{},
                errors:{},
                id:'',
                consultant_user:{},
                focus:null,
                original_gua:null,
                form: new Form({
                    type:'',
                    cast_type:'',
                    question:'',
                    question:'',
                    details:'',
                    hex_code:'',
                    hex_name:'',
                    meaning:'',
                    transforms:'',
                    transform_name:'',
                    transMeaning:'',
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
                axios.get('api/user/attribute?api_token='+window.token)
                .then(response => {
                    this.attributes = response.data
                });
            },

            loadJournal(){
                axios.get('api/journal?api_token='+window.token)
                .then(response => {
                    this.journals = response.data;
                    this.displayDetails(response.data[0].type);
                });
            },

            btnCreate(){
                $('#createDiaryModal').modal('show');
                this.loadAttribute();
            },
          

            castHex(){
                this.form.cast_type = "Hexagram";
                axios.get('/api/user/cast?api_token=' +window.token)
                .then(response => {
                    this.form.original_hex_id = response.data.hexagram[0].id;
                    this.form.hex_name = response.data.hexagram[0].name;
                    this.form.meaning = response.data.hexagram[0].meaning;
                    
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
                    this.form.hex_code = hex;
                    this.original_gua = response.data.hexagram[0].id;
                    
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
                axios.post('api/user/transform/name?api_token='+window.token,{transformName:this.form.transforms,focus:this.focus,gua:this.original_gua})
                .then(response => {
                    this.form.transform_hex_id = response.data.name.id;
                    this.form.transform_name = response.data.name.name;
                    this.form.transMeaning = response.data.meaning.yao_text;
                });
            },
            castTri(){
                this.form.cast_type = "Trigram";
                axios.get('api/user/trigram?api_token='+window.token)
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
                    this.form.post('api/journal?api_token='+window.token)
                    .then(response =>{
                            $('#createDiaryModal').modal('hide');
                            window.location = "/diaries";
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
                }
            },

            displayDetails(id){
                this.form.get('api/journal/'+id+"?api_token="+window.token)
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
            loadConsultantDiary(){
                axios.get('api/consultant-user-diary?api_token='+window.token)
                .then(response => {
                    this.consultant_user = response.data;
                });
            },
            oracleNumber(){
                this.$refs.oracleNumber.showModal();
            }
        },
        mounted() {
            this.loadJournal();
            this.loadConsultantDiary();
        },
    }
</script>
