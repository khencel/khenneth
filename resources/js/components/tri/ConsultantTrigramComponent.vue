<template>
   <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Trigram</th>
                                <th class="text-right">Action</th>
                            </thead>
                            <tbody>
                                <tr v-for="trigram in trigrams.data" :key="trigram.id">
                                    <td>{{trigram.id}}</td>
                                    <td>{{trigram.name}}</td>
                                    <td class="text-right">
                                        <span class="badge badge-primary p-2" style="cursor:pointer" @click="viewTrigram(trigram.id)">
                                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M13.5,4A1.5,1.5 0 0,0 12,5.5A1.5,1.5 0 0,0 13.5,7A1.5,1.5 0 0,0 15,5.5A1.5,1.5 0 0,0 13.5,4M13.14,8.77C11.95,8.87 8.7,11.46 8.7,11.46C8.5,11.61 8.56,11.6 8.72,11.88C8.88,12.15 8.86,12.17 9.05,12.04C9.25,11.91 9.58,11.7 10.13,11.36C12.25,10 10.47,13.14 9.56,18.43C9.2,21.05 11.56,19.7 12.17,19.3C12.77,18.91 14.38,17.8 14.54,17.69C14.76,17.54 14.6,17.42 14.43,17.17C14.31,17 14.19,17.12 14.19,17.12C13.54,17.55 12.35,18.45 12.19,17.88C12,17.31 13.22,13.4 13.89,10.71C14,10.07 14.3,8.67 13.14,8.77Z" />
                                            </svg>
                                            View
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="trigramModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{triInfo.name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class="text-center" v-for="item in tri" :key="item.id">
                        <img class="mb-1" v-show="item == 1" style="width:60%;height:50px;" src="/img/solidLine.png" alt="">
                        <img class="mb-1" v-show="item == 0" style="width:60%;height:50px;" src="/img/brokenLine.png" alt=""> 
                    </div>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Nature:
                        </div>
                        <div class="col-md-9">
                            <span v-for="item in triInfo.nature_trigram" :key="item.id">
                                {{item.nature_id}},
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Element:
                        </div>
                        <div class="col-md-9">
                            <span>
                                {{triInfo.element}}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            People:
                        </div>
                        <div class="col-md-9">
                            <span v-for="(item, index) in triInfo.tri_people" :key="index">
                                {{item.people_id}},
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Body Part:
                        </div>
                        <div class="col-md-9">
                            <span v-for="(item, index) in triInfo.tri_body_part" :key="index">
                                {{item.body_part_id}},
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Animal:
                        </div>
                        <div class="col-md-9">
                            <span v-for="(item, index) in triInfo.tri_animal" :key="index">
                                {{item.animal_id}},
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Sickness:
                        </div>
                        <div class="col-md-9">
                            <span v-for="(item, index) in triInfo.tri_sickness" :key="index">
                                {{item.sickness_id}},
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Color:
                        </div>
                        <div class="col-md-9">
                            <span v-for="(item, index) in triInfo.tri_color" :key="index">
                                {{item.color_id}},
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Shape:
                        </div>
                        <div class="col-md-9">
                            <span>
                                {{triInfo.shape}}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Sickness:
                        </div>
                        <div class="col-md-9">
                            <span v-for="(item, index) in triInfo.tri_deity" :key="index">
                                {{item.deity_id}},
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Door:
                        </div>
                        <div class="col-md-9">
                            <span>
                                {{triInfo.door}}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Star:
                        </div>
                        <div class="col-md-9">
                            <span>
                                {{triInfo.star}}
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-3 font-weight-bold font-italic">
                            Direction:
                        </div>
                        <div class="col-md-9">
                            <span>
                                {{triInfo.direction}}
                            </span>
                        </div>
                    </div>
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
    export default {
        data(){
            return {    
                trigrams:{},
                tri:{},
                triInfo:'',
            }
        },
        methods:{
            loadTrigram(){
                axios.get('api/tri/index?api_token='+window.token)
                .then(response => {
                    console.log(response.data);
                    this.trigrams = response.data;
                });
            },

            viewTrigram(id){
                
                axios.get('api/tri/show/'+id+"?api_token="+window.token)
                .then(response => {
                    $('#trigramModal').modal('show');
                    this.tri = response.data.code.split("");
                    this.triInfo = response.data;
                    
                });
            }
        },
        mounted() {
            this.loadTrigram();
        }
    }
</script>
