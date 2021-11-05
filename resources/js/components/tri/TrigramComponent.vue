<template>
   
    <div class="card">
        <div class="card-header">Trigram</div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Trigram name</th>
                    <th class="text-right">Action</th>
                </thead>
                <tbody>
                    <tr v-for="trigram in trigrams.data" :key="trigram.id">
                        <td>{{trigram.id}}</td>
                        <td>{{trigram.name}}</td>
                        <td class="text-right">
                            <button class="btn btn-primary" @click="modalTrigram(trigram.id)"><i class="fas fa-pencil-alt"></i>Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    <notifications group="notification" position="bottom right"/>


    <div class="modal fade" id="trigramModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{form.name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" v-model="form.name">
                </div>
                <div class="mt-2">
                    <label for="name">Nature:</label>
                    <Multiselect
                    v-model="form.nature"
                    :multiple="true"
                    :options="options">
                    </Multiselect>
                    <span class="font-italic text-danger" v-if="errors.nature" v-text="errors.nature[0]"></span>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-2">
                            <label for="name">Element:</label>
                            <Multiselect
                            v-model="form.element"
                            :options="element">
                            </Multiselect>
                            <span class="font-italic text-danger" v-if="errors.element" v-text="errors.element[0]"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-2">
                            <label for="name">Number:</label>
                            <Multiselect
                            v-model="form.number"
                            :options="number">
                            </Multiselect>
                            <span class="font-italic text-danger" v-if="errors.number" v-text="errors.number[0]"></span>
                        </div>
                    </div>
                </div>
                
                <div class="mt-2">
                    <label for="name">People:</label>
                    <Multiselect
                    v-model="form.people"
                    :multiple="true"
                    :options="people">
                    </Multiselect>
                    <span class="font-italic text-danger" v-if="errors.people" v-text="errors.people[0]"></span>
                </div>

                <div class="mt-2">
                    <label for="name">Body Part:</label>
                    <Multiselect
                    v-model="form.bodyPart"
                    :multiple="true"
                    :options="bodyPart">
                    </Multiselect>
                    <span class="font-italic text-danger" v-if="errors.bodyPart" v-text="errors.bodyPart[0]"></span>
                </div>

                <div class="mt-2">
                    <label for="name">Animal:</label>
                    <Multiselect
                    v-model="form.animal"
                    :multiple="true"
                    :options="animal">
                    </Multiselect>
                    <span class="font-italic text-danger" v-if="errors.animal" v-text="errors.animal[0]"></span>

                </div>

                <div class="mt-2">
                    <label for="name">Sickness:</label>
                    <Multiselect
                    v-model="form.sickness"
                    :multiple="true"
                    :options="sickness">
                    </Multiselect>
                    <span class="font-italic text-danger" v-if="errors.sickness" v-text="errors.sickness[0]"></span>

                </div>

                <div class="mt-2">
                    <label for="name">Color:</label>
                    <Multiselect
                    v-model="form.color"
                    :multiple="true"
                    :options="color">
                    </Multiselect>
                    <span class="font-italic text-danger" v-if="errors.color" v-text="errors.color[0]"></span>

                </div>

                <div class="mt-2">
                    <label for="name">Deity:</label>
                    <Multiselect
                    v-model="form.deity"
                    :multiple="true"
                    :options="deity">
                    </Multiselect>
                    <span class="font-italic text-danger" v-if="errors.deity" v-text="errors.deity[0]"></span>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-2">
                            <label for="name">Shape:</label>
                            <Multiselect
                            v-model="form.shape"
                            :options="shape">
                            </Multiselect>
                        </div>
                        <span class="font-italic text-danger" v-if="errors.shape" v-text="errors.shape[0]"></span>

                    </div>
                    <div class="col-md-6">
                        <div class="mt-2">
                            <label for="name">Door:</label>
                            <Multiselect
                            v-model="form.door"
                            :options="door">
                            </Multiselect>
                            <span class="font-italic text-danger" v-if="errors.door" v-text="errors.door[0]"></span>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-2">
                            <label for="name">Star:</label>
                            <Multiselect
                            v-model="form.star"
                            :options="star">
                            </Multiselect>
                            <span class="font-italic text-danger" v-if="errors.star" v-text="errors.star[0]"></span>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-2">
                            <label for="name">Direction:</label>
                            <Multiselect
                            v-model="form.direction"
                            :options="direction">
                            </Multiselect>
                            <span class="font-italic text-danger" v-if="errors.direction" v-text="errors.direction[0]"></span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="btnSave">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    </div>
            
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        components: { Multiselect },
        data(){
            return {
                errors:{},
                options: [],
                element:[],
                people:[],
                bodyPart:[],
                animal:[],
                sickness:[],
                color:[],
                deity:[],
                number:[
                   1,2,3,4,6,7,8,9
                ],
                shape:[
                    "Square",
                    "Oblong",
                    "Round",
                    "Sharp",
                ],
                door:[
                    "Death",
                    "Harm",
                    "Delusion",
                    "Open",
                    "Fear",
                    "Life",
                    "Scenery"
                    
                ],
                star:[
                    "Grain",
                    "Destructor",
                    "Assistant",
                    "Heart",
                    "Pillar",
                    "Ambassador",
                    "Hero",
                    
                ],
                direction:[
                    "North",
                    "Southwest",
                    "East",
                    "Southeast",
                    "Northwest",
                    "West",
                    "Northeast",
                    "South",
                    
                ],
                trigrams:{},
                errors:{},
                form: new Form({
                    id:'',
                    name:'',
                    nature: [],
                    element: null,
                    number: null,
                    people: [],
                    bodyPart: [],
                    animal: [],
                    sickness: [],
                    color: [],
                    shape: null,
                    deity: [],
                    door: null,
                    star: null,
                    direction: null,
                }),
            }
        },
        methods:{
            loadTrigram(){
                axios.get('api/tri/index?api_token='+window.token)
                .then(response => {
                    this.trigrams = response.data;
                });
            },
            modalTrigram(id){
                this.errors = [];
                this.form.nature = [];
                this.form.element = null;
                this.form.number = null;
                this.form.people = [];
                this.form.bodyPart = [];
                this.form.animal = [];
                this.form.sickness = [];
                this.form.color = [];
                this.form.shape = null;
                this.form.deity = [];
                this.form.door = null;
                this.form.star = null;
                this.form.direction = null;
                this.loadProperties();
                this.form.id = id;
                axios.get('api/tri/show/'+id+'?api_token='+window.token)
                .then(response => {
                    $('#trigramModal').modal('show');
                    this.form.name = response.data.name;
                    this.form.element = response.data.element;
                    this.form.number = response.data.number;
                    this.form.shape = response.data.shape;
                    this.form.door = response.data.door;
                    this.form.star = response.data.star;
                    this.form.direction = response.data.direction;

                    response.data.nature_trigram.forEach(element => {
                        this.form.nature.push(element.nature_id);
                    });

                    response.data.tri_people.forEach(element => {
                        this.form.people.push(element.people_id);
                    });

                    response.data.tri_body_part.forEach(element => {
                        this.form.bodyPart.push(element.body_part_id);
                    });

                    response.data.tri_animal.forEach(element => {
                        this.form.animal.push(element.animal_id);
                    });

                    response.data.tri_sickness.forEach(element => {
                        this.form.sickness.push(element.sickness_id);
                    });

                    response.data.tri_color.forEach(element => {
                        this.form.color.push(element.color_id);
                    });

                    response.data.tri_deity.forEach(element => {
                        this.form.deity.push(element.deity_id);
                    });
                });
            },
            loadProperties(){
                axios.get('api/nature/index?api_token='+window.token)
                .then(response => {
                    this.options = response.data;

                });

                axios.get('api/properties/property?api_token='+window.token)
                .then(response => {
                    
                    this.element = response.data[0];
                    this.people = response.data[1];
                    this.bodyPart = response.data[2];
                    this.animal = response.data[3];
                    this.sickness = response.data[4];
                    this.color = response.data[5];
                    this.deity = response.data[6];
                });
            },
            btnSave(){
                axios.put('api/tri/update/'+this.form.id+'?api_token='+window.token,this.form)
                .then(response => {
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Update Trigram',
                        text: 'Trigram record has been updated'
                    });
                    $('#trigramModal').modal('hide');
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
            }
        },
        mounted() {
            this.loadTrigram();
        }
    }
</script>
