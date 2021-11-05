<template>
    <div class="modal fade" id="numberJournal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:9999">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Journal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                    <div class="row p-4">
                        <div class="col-md-6">
                            <button class="button-success form-control" @click="oracleViaNumber">Oracle Via Number</button>
                        </div>
                        <div class="col-md-6">
                            <button class="button-primary form-control text-white" @click="oracleViaText">Oracle Via Text</button>
                        </div>
                    </div>
                    <div v-show="oracleNumbShow">
                        <div class="text-center">
                            <h4>Oracle Via Number</h4>
                        </div>
                        
                        <OracleNumber ref="oracleNumber" @saveSuccess="saveSuccess"></OracleNumber>
                    </div>  
                    <div v-show="oracleTextShow">
                        <div class="text-center">
                            <h4>Oracle Via Text</h4>
                        </div>
                        
                        <OracleText ref="oracleText"></OracleText>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import OracleNumber from '../oracle/IndexNumber';
    import OracleText from '../oracle/IndexText';
    export default {
        components:{
            OracleNumber,
            OracleText
        },
        data(){
            return{
                oracleNumbShow:false,
                oracleTextShow:false,
            }
        },
        mounted() {
            
        },

        methods:{
            showModal(){
                $('#numberJournal').modal('show');
                this.$refs.oracleNumber.journal = true;
            },
            oracleViaNumber(){
                this.oracleNumbShow = true;
                this.oracleTextShow = false;
                this.$refs.oracleNumber.diary = true;
            },
            oracleViaText(){
                this.oracleNumbShow = false;
                this.oracleTextShow = true;
                this.$refs.oracleText.diary = true;
            },
            saveSuccess(){
                $('#numberJournal').modal('hide');
            }
        }
    }
</script>
