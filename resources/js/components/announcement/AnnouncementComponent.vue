<template>
    <div>
        <div class="card p-2">
            <button class="button-success w-25 ml-auto" @click="announcementModal">Create Announcement</button>
        </div>
        <div class="card p-2">
            <table class="table table-hover ">
                <thead> 
                    <th>Date</th>
                    <th>Subject</th>
                    <th>Announcement</th>
                </thead>
               
                <tbody>
                    <tr v-if="Object.keys(announcements).length == 0">
                        <td colspan="4" class="text-center">No Announcement...</td>
                    </tr>
                    <tr v-else v-for="announcement in announcements" :key="announcement.id">
                        <td>{{announcement.date}}</td>
                        <td>{{announcement.subject}}</td>
                        <td>
                            {{announcement.announcement}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Announcement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="">Subject</label>
                        <input type="text" class="form-control" v-model="form.subject" placeholder="Subject">
                        <span class="text-danger font-italic" v-if="errors.subject" v-text="errors.subject[0]"></span>
                    </div>
                    <div class="mt-2">
                        <label for="">Announcement</label>
                        <textarea id="" cols="30" rows="10" v-model="form.announcement" placeholder="Announcement here..." class="form-control"></textarea>
                        <span class="text-danger font-italic" v-if="errors.announcement" v-text="errors.announcement[0]"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="btnSave">Publish</button>
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
                errors:{},
                announcements:{},
                form:new Form({
                    subject:'',
                    announcement:'',
                    date:new Date().toDateString(),
                }),
            }
        },
        methods:{
            announcementModal(){
                $('#announcementModal').modal('show');
            },
            
            index(){
                axios.get('api/announcement?api_token='+window.token)
                .then(response=>{
                    this.announcements = response.data;
                });
            },
            btnSave(){
                this.form.post('api/announcement?api_token='+window.token)
                .then(response =>{
                    $('#announcementModal').modal('hide');  
                    this.index();
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
            }
        },
        mounted() {
            this.index();
            console.log('Component mounted.')
        }
    }
</script>
