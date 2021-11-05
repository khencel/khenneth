<template>
<div>
    <notifications group="notification" position="bottom right"/>
    <div class="mt-2">
        <hr>
        <label for="mode">Mode:</label>
        <select class="form-control" v-model="form.mode">
            <option value="" disabled hidden>Select Mode</option>
            <option value="Online Meeting">Online Meeting</option>
            <option value="Face to Face">Face to Face</option>
        </select>
        <span class="font-italic text-danger" v-if="errors.mode" v-text="errors.mode[0]"></span>
    </div>
    <div class="mt-2">
        <label for="date">Date:</label>
        <input type="date" class="form-control" id="select-date" v-model="form.date" :min="currentDate">
        <span class="font-italic text-danger" v-if="errors.date" v-text="errors.date[0]"></span>
    </div>
    <div class="mt-2">
        <label for="time">Time:</label>
        <select name="" id="" class="form-control" v-model="form.time">
            <option value="" disabled hidden>Select Time</option>
            <option v-for="(item, index) in time" :key="index" :value="item.value">
                {{item.time}}
            </option>
        </select>
        <span class="font-italic text-danger" v-if="errors.time" v-text="errors.time[0]"></span>
    </div>
    <div class="mt-5 text-right">
        <button v-show="!available" class="btn btn-primary" @click="check">Check if Available</button>
        <button v-show="available" class="btn btn-success" @click="btnPayment">Book Now</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="consultanPaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Schedule Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="paypal-button-container"></div>
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
        props:['id'],
        data(){
            return{
                available:false,
                time:[
                    {
                        time:"8:00am",
                        value:'8'
                    },
                    {
                        time:"9:00am",
                        value:'9'
                    },
                    {
                        time:"10:00am",
                        value:'10'
                    },
                    {
                        time:"11:00am",
                        value:'11'
                    },
                    {
                        time:"12:00pm",
                        value:'12'
                    },
                    {
                        time:"1:00pm",
                        value:'13'
                    },
                    {
                        time:"2:00pm",
                        value:'14'
                    },
                    {
                        time:"3:00pm",
                        value:'15'
                    },
                    {
                        time:"4:00pm",
                        value:'16'
                    },
                    {
                        time:"5:00pm",
                        value:'17'
                    },
                    {
                        time:"6:00pm",
                        value:'18'
                    },
                    {
                        time:"7:00pm",
                        value:'19'
                    },
                    {
                        time:"8:00pm",
                        value:'20'
                    },
                    {
                        time:"9:00pm",
                        value:'21'
                    },
                    {
                        time:"10:00pm",
                        value:'22'
                    },
                ],
                price: 9.99,
                currentDate:'',
                errors:{},
               form: new Form({
                   id: this.id,
                   mode:'',
                   date:'',
                   time:'',
               }),
            }
        },

        mounted() {
            this.paypal();
            this.getCurrentDate();
        },

        methods:{
            check(){
                var current = new Date();
                var selectedDate = new Date(document.getElementById('select-date').value);
                var validHour = current.getHours()+2;

                if(current.getDate() == selectedDate.getDate() && validHour >= this.form.time){
                    this.$notify({
                        group: 'notification',
                        type: 'error',
                        title: 'Invalid Time',
                        text: 'Please time must be 2 hours before.'
                    });
                }else{
                    this.approveTime();
                }
            },

            approveTime(){
                axios.post('/api/user/check?api_token='+window.token,this.form)
                .then(response => {
                    this.errors = [];
                    if(response.data == 0){
                        this.available = false;
                        this.$notify({
                            group: 'notification',
                            type: 'error',
                            title: 'Schedule',
                            text: 'Schedule not available'
                        });
                    }else{
                        this.available = true;
                        this.$notify({
                            group: 'notification',
                            type: 'success',
                            title: 'Schedule',
                            text: 'Schedule Available, Book Now'
                        });
                    }
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
            },
            
            bookNow(){
                        axios.post('/api/user/bookNow?api_token='+window.token,this.form)
                        .then(response => {
                            this.errors = [];
                            
                            this.$notify({
                                group: 'notification',
                                type: 'success',
                                title: 'Schedule',
                                text: 'Your Schedule has been booked'
                            });
                            window.location = "/schedule";
                        })
                        .catch(error => {
                            this.errors = error.response.data.errors;
                        });
            },

            getCurrentDate(){
                var date = new Date();
                
                var y = date.getFullYear();
                var d = date.getDate();
                var m = date.getMonth()+1;
                if(m < 10){
                    m = "0"+m;
                }
                this.currentDate = y+"-"+m+"-"+d
                
            },

            btnPayment(){
                $('#consultanPaymentModal').modal('show');
            },

            paypal(){
                paypal.Buttons({
                    createOrder: (data, actions) => {
                        return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: this.price
                            }
                        }]
                        });
                    },
                    onApprove: async(data, actions) => {
                        this.bookNow();
                      
                        return actions.order.capture().then(function(details) {
                        // alert('Transaction completed by ' + details.payer.name.given_name);
                        });
                        
                    }
                }).render('#paypal-button-container');
            },

        
        }
    }
</script>
