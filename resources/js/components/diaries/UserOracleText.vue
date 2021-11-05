<template>
    <div class=" border">
        <h3 class="ml-2">Oracle Text</h3>
        <div v-if="Object.keys(oracles).length == 0" class="w-100 ml-2" style="color:gray">
            No record...
        </div>
        <div v-else class="mt-2 shadow p-3" v-for="oracle in oracles" :key="oracle.id" >
            <div>
                <span class="label-text">Text:</span>
                <br>
                <span class="text-format text-uppercase">
                    {{oracle.text}}
                </span>
                
            </div>
            <div>
                <span class="label-text">Question:</span>
                <br>
                {{oracle.question}}
            </div>
            <div>
                <span class="label-text">Details:</span>
                <br>
                {{oracle.details}}
            </div>
            <div>
                <span class="number-format">{{oracle.derivation.number}}</span>
            </div>
            <div>
                <span class="oracle-numb-format">
                    {{oracle.derivation.oracle.number}}
                </span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid" :src="'/img/rating/'+oracle.derivation.oracle.rating+'.png'" alt="">
                </div>
                <div class="col-md-6 h3">
                    <span v-for="item in rating_labels" :key="item.rating" v-show="item.rating == oracle.derivation.oracle.rating">
                        {{item.label}}
                    </span>
                </div>
            </div>
            <div>
                {{oracle.derivation.oracle.text}}
            </div>
            
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                oracles:{},
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
            }
        },
        mounted() {
            this.showOracleNumber();
        },
        methods:{
            showOracleNumber(){
                axios.get('/api/oracle/showText?api_token='+window.token)
                .then(res => {
                    this.oracles = res.data;
                });
            }
        }
    }
</script>
<style scoped>
    .label-text{
        font-weight: bold;
        font-style: italic;
    }
    .number-format{
        font-weight: bold;
        font-size: 40px;
    }
    .oracle-numb-format{
        font-weight: bold;
        font-size: 20px;
    }
    .text-format{
        font-size: 25px;
        font-weight: bold;
        font-style: italic;
        color: #FF401F;
    }
</style>
