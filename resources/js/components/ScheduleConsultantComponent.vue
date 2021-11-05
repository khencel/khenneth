<template>
    <div>
        <notifications group="notification" position="bottom right"/>
        <div class="card">
            <div class="card-header">Schedule</div>

            <div class="card-body position-relative">
                <table class="table table-hover">
                    <thead>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Mode</th>
                        <th>Appointment To</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr v-if="Object.keys(schedules).length == 0">
                            <td class="text-center" colspan="5">No schedule</td>
                        </tr>
                        <tr v-else v-for="(schedule, index) in schedules" :key="index" :class="schedule.status=='booked'?'':'bg-danger'">
                            <td>{{schedule.date}}</td>
                            <td>{{schedule.time}}:00</td>
                            <td>{{schedule.mode}}</td>
                            <td>
                                <span v-for="(item, index) in schedule.consultant" :key="index">
                                    {{item.firstname}} {{item.lastname}}
                                </span>

                                <span v-for="(item, index) in schedule.appointment_user" :key="index">
                                    {{item.firstname}} {{item.lastname}}
                                </span>
                                </td>
                                <td v-if="schedule.status == 'booked'">
                                    <a :href="'/consult/user/'+schedule.appointment_user[0].api_token+'/'+schedule.id">
                                    <span class="badge badge-success p-2"><i class="fas fa-check-circle"></i>Accept</span>
                                    </a>
                                    <span class="badge badge-danger p-2" @click="btnCancel(schedule.id,schedule.date,schedule.time)" style="cursor:pointer">X Decline</span>
                                </td>
                                <td v-else>
                                    Schedule has been canceled
                                    <button class="button-primary" @click="btnDelete(schedule.id)">OK</button>
                                </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
        <!-- modal -->
        <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Schedule Cancelation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="">Reason for cancelation</label>
                        <textarea class="form-control" placeholder="Reason here..." name="" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="text-right">
                        <small>
                            <span class="font-weight-bold text-danger font-italic">Note:</span>
                            You can cancel schedule 2 hours before your meeting 
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="check">Cancel Schedule</button>
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
                schedules:{},
                id:'',
                date:'',
                time:'',
                
            }
        },
        methods:{
            loadSchedule(){
                axios.get('api/user/schedule?api_token='+window.token)
                .then(response => {
                    this.schedules = response.data;
                });
            },

            btnCancel(id,date,time){
                $('#cancelModal').modal('show');
                this.id = id;
                this.date = date;
                this.time = time;
            },
            check(){
                var current = new Date();
                var selectedDate = new Date(this.date);
                var validHour = current.getHours()+2;
                
                if(current.getDate() == selectedDate.getDate() && validHour >= this.time){
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Cancelation not success',
                        text: 'Please time must be at least 2 hours before.'
                    });
                }else{
                    this.cancelBooking();
                }
            },

            cancelBooking(){
                axios.get('api/user/cancelBooking?api_token='+window.token+'&schedule_id='+this.id)
                .then(response => {
                    $('#cancelModal').modal('hide');
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Cancelation Success',
                        text: 'Schedule has been cancel'
                    });
                    this.loadSchedule();
                })
            },
            btnDelete(id){
                
                axios.get('api/user/cancelDelete/'+id+'?api_token='+window.token)
                .then(response => {
                    this.loadSchedule();
                });
            }
        },
        mounted() {
            this.loadSchedule();
        }
    }
</script>
