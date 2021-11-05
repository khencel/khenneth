<template>

<div class="card">
            <div class="card-header">
                Hexagram
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th class="text-right">Action</th>
                    </thead>
                    <tbody>
                        <tr v-for="hex in hexagram.data" :key="hex.id">
                            <td>{{hex.id}}</td>
                            <td>{{hex.name}}</td>
                            <td class="text-right"><button class="btn btn-primary" @click="hexModal(hex.id)"><i class="fas fa-pencil-alt"></i>Edit</button></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row justify-content-end mt-2">
                    <pagination class="mr-2" :limit="2" :data="hexagram" @pagination-change-page="hexIndex"></pagination>
                </div>
            </div>
            <notifications group="notification" position="bottom right"/>

            <div class="modal fade" id="hexagramModal" tabindex="-1" style="z-index:9999" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{hexLabel}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-5">
                            <div class="row justify-content-center">
                                <div class="col-md-7 text-center p-0" style="position:relative;min-height:450px;background-color:#CCCCCC">
                                    <img class="img-fluid" :src="url == '/storage/img/null'? '/storage/img/default.jpg' :url" alt="">  
                                    <div class=" p-2" style="width:150px;height:auto;position:absolute;right:5px;bottom:5px;background-color:#C2C0C3">
                                        <div v-for="(item, index) in image" :key="index">
                                            <img :class="index == 2?'mb-3':''" v-show="item == 1" src="img/solidLine.png" style="margin-bottom:1px;width:85%;" alt="">
                                            <img :class="index == 2?'mb-3':''" v-show="item == 0" src="img/brokenLine.png" style="margin-bottom:1px;width:85%;" alt="">
                                        </div>
                                        <strong class="h3">{{form.name}}</strong>
                                    </div> 
                                </div>
                            </div>
                            <div class="choose_file">
                                    <label class="bg-success p-2" style="cursor:pointer"> Upload Image
                                        <input type="file" size="60" name="img" accept="image/*" v.form="photo" @change="uploadImage">
                                    </label> 
                            </div>

                            <div>
                                <label for="name">Name:</label>
                                <input type="text" readonly v-model="form.name" class="form-control">
                                <span class="font-italic text-danger" v-if="errors.name" v-text="errors.name[0]"></span>
                            </div>
                            <div class="mt-2">
                                    <label for="name">Poem:</label>
                                    <textarea class="form-control" v-model="form.poem" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.poem" v-text="errors.poem[0]"></span>
                            </div>
                            <div class="mt-2">
                                    <label for="name">Meaning:</label>
                                    <textarea class="form-control" v-model="form.meaning" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.meaning" v-text="errors.meaning[0]"></span>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <strong>Properties</strong>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Business Opening:</label>
                                    <textarea class="form-control" v-model="form.opening" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.opening" v-text="errors.opening[0]"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="name">Rating</label>
                                    <select v-model="form.opening_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Nobleman:</label>
                                    <textarea class="form-control" v-model="form.nobleman" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.nobleman" v-text="errors.nobleman[0]"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="name">Rating</label>
                                    <select v-model="form.nobleman_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Weather:</label>
                                    <textarea class="form-control" v-model="form.weather" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.weather" v-text="errors.weather[0]"></span>
                                </div>
                                <div class="col-md-4">
                                    <label for="name">Rating</label>
                                    <select v-model="form.weather_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                     <label for="name">General Luck:</label>
                                    <textarea class="form-control" v-model="form.general" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.general" v-text="errors.general[0]"></span>
                                </div>
                                <div class="col-md-4 ">
                                     <label for="name">Rating</label>
                                    <select v-model="form.general_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Wealth:</label>
                                    <textarea class="form-control" v-model="form.wealth" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.wealth" v-text="errors.wealth[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.wealth_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Expectant Mothers:</label>
                                    <textarea class="form-control" v-model="form.mothers" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.mothers" v-text="errors.mothers[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.mothers_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Relationship:</label>
                                    <textarea class="form-control" v-model="form.relationship" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.relationship" v-text="errors.relationship[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.relationship_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Business:</label>
                                    <textarea class="form-control" v-model="form.business" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.business" v-text="errors.business[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.business_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Family:</label>
                                    <textarea class="form-control" v-model="form.family" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.family" v-text="errors.family[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.family_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Legal Matters:</label>
                                    <textarea class="form-control" v-model="form.legal" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.legal" v-text="errors.legal[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.legal_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Examination:</label>
                                    <textarea class="form-control" v-model="form.examination" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.examination" v-text="errors.examination[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.examination_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Travel:</label>
                                    <textarea class="form-control" v-model="form.travel" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.travel" v-text="errors.travel[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.travel_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Health:</label>
                                    <textarea class="form-control" v-model="form.health" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.health" v-text="errors.health[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.health_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>

                             <div class="row mt-2">
                                <div class="col-md-8">
                                    <label for="name">Lost Property:</label>
                                    <textarea class="form-control" v-model="form.property" id="" cols="20" rows="2"></textarea>
                                    <span class="font-italic text-danger" v-if="errors.property" v-text="errors.property[0]"></span>
                                </div>
                                <div class="col-md-4">
                                     <label for="name">Rating</label>
                                    <select v-model="form.property_rating" class="form-control" name="">
                                        <option disabled hidden value="">Rate this properties</option>
                                        <option v-for="(rating, index) in ratings" :key="index" :value="rating.value">{{rating.value}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click="updateHex">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
</template>

<script>
    export default {
        data(){
            return {
                url:null,
                hexagram:{},
                hexLabel:'',
                showHex:{},
                errors:{},
                image:'',
                ratings:[
                    {
                        value:20
                    },
                    {
                        value:40
                    },
                    {
                        value:60
                    },
                    {
                        value:80
                    },
                    {
                        value:100
                    },
                ],
                form: new Form({
                    photo:'',
                    id:'',
                    name:'',
                    poem:'',
                    meaning:'',
                    opening:'',
                    opening_rating:'',
                    nobleman:'',
                    nobleman_rating:'',
                    weather:'',
                    weather_rating:'',
                    general:'',
                    general_rating:'',
                    wealth:'',
                    mothers:'',
                    mothers_rating:'',
                    wealth_rating:'',
                    relationship:'',
                    relationship_rating:'',
                    business:'',
                    business_rating:'',
                    family:'',
                    family_rating:'',
                    legal:'',
                    legal_rating:'',
                    examination:'',
                    examination_rating:'',
                    travel:'',
                    travel_rating:'',
                    health:'',
                    health_rating:'',
                    property:'',
                    property_rating:''
                    
                }),
            }
        },
        methods:{
            uploadImage(e){
                let file = e.target.files[0];
                this.url = URL.createObjectURL(file);
                let reader = new FileReader();
                reader.onloadend = (file) => {
                    this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
            },

            hexIndex(page = 1){
                axios.get('/api/hex/index?page='+page+'&api_token='+window.token)
                .then(response => {
                    this.hexagram = response.data;
                });
            },

            hexModal(id){
                this.errors = [];
                this.form.id = id;
                this.url = null;
                axios.get('api/hex/show/'+id+"?api_token="+window.token)
                .then(response => {
                    this.hexLabel = response.data.name;
                    this.url = '/storage/img/'+response.data.photo;
                    this.image = response.data.code.split("");
                    this.form.name = response.data.name;
                    this.form.poem = response.data.poem;
                    this.form.meaning = response.data.meaning;
                    this.form.nobleman = response.data.nobleman[0].description;
                    this.form.nobleman_rating = response.data.nobleman[0].rating;
                    this.form.opening = response.data.opening[0].description;
                    this.form.opening_rating = response.data.opening[0].rating;
                    this.form.weather = response.data.weather[0].description;
                    this.form.weather_rating = response.data.weather[0].rating;
                    this.form.general = response.data.luck[0].description;
                    this.form.general_rating = response.data.luck[0].rating;

                    this.form.wealth = response.data.wealth[0].description;
                    this.form.wealth_rating = response.data.wealth[0].rating;

                    this.form.mothers = response.data.mother[0].description;
                    this.form.mothers_rating = response.data.mother[0].rating;

                    this.form.relationship = response.data.relationship[0].description;
                    this.form.relationship_rating = response.data.relationship[0].rating;

                    this.form.business = response.data.business[0].description;
                    this.form.business_rating = response.data.business[0].rating;

                    this.form.family = response.data.family[0].description;
                    this.form.family_rating = response.data.family[0].rating;

                    this.form.legal = response.data.legal[0].description;
                    this.form.legal_rating = response.data.legal[0].rating;

                    this.form.examination = response.data.examination[0].description;
                    this.form.examination_rating = response.data.examination[0].rating;

                    this.form.travel = response.data.travel[0].description;
                    this.form.travel_rating = response.data.travel[0].rating;

                    this.form.health = response.data.health[0].description;
                    this.form.health_rating = response.data.health[0].rating;

                    this.form.property = response.data.properties[0].description;
                    this.form.property_rating = response.data.properties[0].rating;

                    $('#hexagramModal').modal('show');
                });
            },

            updateHex(){
                axios.put('api/hex/update/'+this.form.id+"?api_token="+window.token, this.form)
                .then(response => {
                    $('#hexagramModal').modal('hide');
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Update Hexagram',
                        text: 'Hexagram record has been updated'
                    });
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                })
            }
        },
        mounted() {
            this.hexIndex();
        }
    }
</script>
