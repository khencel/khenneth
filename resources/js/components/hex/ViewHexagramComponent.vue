<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>Hexagram</th>
                                <th class="text-right">Action</th>
                            </thead>
                            <tbody>
                                <tr v-for="hex in hexagram.data" :key="hex.id">
                                    <td>{{hex.id}}</td>
                                    <td>{{hex.name}}</td>
                                    <td class="text-right">
                                        <a :href="'/hex/'+hex.id">
                                        <button class="btn btn-primary p-2" style="cursor:pointer">
                                            <i class="fas fa-info"></i>
                                            view
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-end mt-2">
                            <pagination class="mr-2" :limit="2" :data="hexagram" @pagination-change-page="loadHex"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                hexagram:{},
            }
        },
        methods:{
            loadHex(page = 1){
                axios.get('/api/hex/index?page='+page+'&api_token='+window.token)
                .then(response => {
                    this.hexagram = response.data;
                });
            }
        },
        mounted() {
           this.loadHex();
        }
    }
</script>
