<style scoped>
    .label{
        font-weight: bold;
        color: black;
    }

    .avatar-cont:hover{
        border: 1px solid gray;
    }
</style>
<template>
    <div class="container">
        <h2 class="m-auto">Consultant</h2>
        <div class="row p-3">
            <div class="col-md-3 shadow pt-4 pb-3 avatar-cont" v-for="user in users" :key="user.id">
                <a :href="'/consultan/'+user.api_token">
                <div>
                    <div class="p-3 border">
                        <img src="img/avatarMale.png" alt="" class="img-fluid">
                    </div>
                    <table>
                        <tr>
                            <td class="label">Name:</td>{{user.firstname}} {{user.lastname}}
                        </tr>
                        <tr>
                            <td class="label">Country:</td>{{user.country}}
                        </tr>
                        <tr>
                            <td class="label">Email:</td>{{user.email}}
                        </tr>
                    </table>
                </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                users:{},
            }
        },
        methods:{
            loadConsultant(){
                var consultants = [];
                axios.get('api/user/consultant?api_token='+window.token)
                .then(response => {
                    response.data.forEach(element => {
                        consultants.push(element.user);
                    });
                    this.users = consultants;
                });
            },
        },
        mounted() {
            this.loadConsultant();
        }
    }
</script>
