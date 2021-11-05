<template>
    <div>
        <notifications group="notification" position="bottom right"/>
        <div class="row border mt-2 pt-3 pb-3">
            <div class="col-md-6 text-center">
                <div class="w-50 float-left">
                    <strong>Original Gua</strong>
                    <div class="w-100" v-for="(item,index) in codes" :key="item.id">
                        <img :class="index == 2?'mb-4':''" v-if="item == 1" src="/img/solidLine.png" width="80%" alt="">
                        <img :class="index == 2?'mb-4':''" v-else src="/img/brokenLine.png" width="80%" alt="">
                    </div>
                    <div>
                        {{hexagram.name}}
                    </div>
                </div>
                <div class="w-50 float-left">
                    <strong>Transformed Gua</strong>
                    <div class="w-100" v-for="(item,index) in code_transform" :key="item.id">
                        <img :class="index == 2?'mb-4':''" v-show="item == 1" src="/img/solidLine.png" width="80%" alt="">
                        <img :class="index == 2?'mb-4':''" v-show="item == 0" src="/img/brokenLine.png" width="80%" alt="">
                        <img :class="index == 2?'mb-4':''" v-show="item == 4" src="/img/solidLineFocus1.png" width="80%" alt="">
                        <img :class="index == 2?'mb-4':''" v-show="item == 3" src="/img/brokenLineFocus.png" width="80%" alt="">
                    </div>
                    <div>
                        {{transform_gua.name}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <label for="yao_text">Yao Poem</label>
                    <textarea v-model="form.yao_poem" class="form-control" placeholder="Enter Yao Poem" cols="30" rows="5"></textarea>
                </div>
                <div class="mt-2">
                    <label for="yao_text">Yao Text</label>
                    <textarea v-model="form.yao_text" class="form-control" placeholder="Enter Yao Text" cols="30" rows="5"></textarea>
                </div>
                <div class="mt-2">
                    <label for="yao_text">Rating</label>
                    <select class="form-control" v-model="form.rating">
                        <option value="" hidden selected>Select Rating</option>
                        <option v-for="(item, index) in ratings" :key="index" :value="item">{{item}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="gen_luck">General Luck</label>
                <textarea v-model="form.gen_luck" class="form-control" placeholder="Enter General Luck" cols="30" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <label for="health">Health</label>
                <textarea v-model="form.health" class="form-control" placeholder="Enter Health" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="relationships">Relationships</label>
                <textarea v-model="form.relationships" class="form-control" placeholder="Enter Relationships" cols="30" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <label for="career_wealth">Career & Wealth</label>
                <textarea v-model="form.career_wealth" class="form-control" placeholder="Enter Career & Wealth" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="expectant_mothers">Expectant Mothers</label>
                <textarea v-model="form.expectant_mothers" class="form-control" placeholder="Enter Expectant Mothers" cols="30" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <label for="examinations">Examinations</label>
                <textarea v-model="form.examinations" class="form-control" placeholder="Enter Examinations" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="lost_property">Lost Property</label>
                <textarea v-model="form.lost_property" class="form-control" placeholder="Enter Lost Property" cols="30" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <label for="missing_persons">Missing Persons</label>
                <textarea v-model="form.missing_persons" class="form-control" placeholder="Enter Missing Persons" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="travel">Travel</label>
                <textarea v-model="form.travel" class="form-control" placeholder="Enter Travel" cols="30" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <label for="legal_matters">Legal Matters</label>
                <textarea v-model="form.legal_matters" class="form-control" placeholder="Enter Legal Matters" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="weather">Weather</label>
                <textarea v-model="form.weather" class="form-control" placeholder="Enter Weather" cols="30" rows="5"></textarea>
            </div>
            <div class="col-md-6">
                <label for="overall_forecast">Overall Forecast</label>
                <textarea v-model="form.overall_forecast" class="form-control" placeholder="Enter Overall Forecast" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="row justify-content-end mt-2">
            <div class="col-md-6">
                <button class="btn btn-success w-25 float-right" @click="saveYao">Save</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:['id','yao'],
    data(){
        return{
            hexagram:{},
            codes:{},
            code_transform:[],
            transform_gua:{},
            focus:"",
            ratings:[
                "Auspicious","Fair","Inauspicious"
            ],
            form: new Form({
                yao:this.yao,
                hexagram_id: this.id,
                hex_transformation_id:'',
                yao_poem:'',
                yao_text:'',
                rating:'',
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
                overall_forecast:''
            }),
        }
    },
    methods:{
        hexYao(){
            axios.get('/api/hexagram/'+this.id+'?api_token='+window.token)
            .then(res => {
                this.hexagram = res.data;
                this.codes = res.data.code.split("");
                this.transformFocus();
                this.transformGua();
            })
        },
        saveYao(){
            this.form.post('/api/hexagram/yao?api_token='+window.token)
            .then(res => {
                this.$notify({
                    group: 'notification',
                    type: 'success',
                    title: 'Update Hexagram',
                    text: 'Hexagram record has been updated'
                });
            })
            .catch()
        },
        showYao(){
            axios.get('/api/hexagram/'+this.id+'/'+this.yao+'?api_token='+window.token)
            .then(res => {
                this.form.yao_poem = res.data.yao_poem;
                this.form.yao_text = res.data.yao_text;
                this.form.rating = res.data.rating != null?res.data.rating:"";
                this.form.gen_luck = res.data.gen_luck;
                this.form.health = res.data.health;
                this.form.relationships = res.data.relationships;
                this.form.career_wealth = res.data.career_wealth;
                this.form.expectant_mothers = res.data.expectant_mothers;
                this.form.examinations = res.data.examinations;
                this.form.lost_property = res.data.lost_property;
                this.form.missing_persons = res.data.missing_persons;
                this.form.travel = res.data.travel;
                this.form.legal_matters = res.data.legal_matters;
                this.form.weather = res.data.weather;
                this.form.overall_forecast = res.data.overall_forecast;
            });
        },


        transformGua(){
            this.codes.forEach(element => {
                this.code_transform.push(
                    element
                );
            });
            
            if(this.code_transform[this.focus] == 1){
                this.code_transform[this.focus] = 3;
            }
            if(this.code_transform[this.focus] == 0){
                this.code_transform[this.focus] = 4
            }
            
            axios.get('/api/hexagram/gua/'+this.code_transform+'?api_token='+window.token)
            .then(response => {
                this.transform_gua = response.data;
                this.form.hex_transformation_id = response.data.id;
            })
        },
        transformFocus(){
            if(this.yao == 1){
                this.focus = 5
            }
            if(this.yao == 2){
                this.focus = 4
            }
            if(this.yao == 3){
                this.focus = 3
            }
            if(this.yao == 4){
                this.focus = 2
            }
            if(this.yao == 5){
                this.focus = 1
            }
            if(this.yao == 6){
                this.focus = 0
            }
        }
    },
    mounted() {
        this.hexYao();
        this.showYao();
    }
}
</script>