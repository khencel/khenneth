<template>
<div>
    <notifications group="notification" position="bottom right"/>
    <div class="card">
        <div class="card-header">System</div>

        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" @click="form.content_name = 'About Us'" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" @click="form.content_name = 'footer'" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Footer</a>
                </li> 
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active pt-2" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <textarea v-model="form.content" cols="30" rows="5" placeholder="About us here..." class="form-control"></textarea>
                    <span class="font-italic text-danger" v-if="errors.content" v-text="errors.content[0]"></span>
                    <button class="button-success mt-2 float-right" @click="aboutUsUpdate">Update</button>
                </div>
                <div class="tab-pane fade p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="text" class="form-control" placeholder="Footer here..." v-model="form.content_footer">
                    <span class="font-italic text-danger" v-if="errors.content_footer" v-text="errors.content_footer[0]"></span>
                    <button class="button-success mt-2 float-right" @click="footerUpdate">Update</button>
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
                editMode:false,
                errors:{},
                form: new Form({
                    id:'',
                    content_name:'About Us',
                    content:'',
                    content_footer:'',
                })
            }
        },
        methods:{
            aboutUsUpdate(){
                this.form.put('api/update/'+this.form.id+'?api_token='+window.token,this.form)
                .then(response => {
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Update About Us',
                        text: 'About us has been updated'
                    });
                    this.loadContent();
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                });
            },
            footerUpdate(){
                this.form.post('api/footer/management?api_token='+window.token,this.form)
                .then(response => {
                    this.$notify({
                        group: 'notification',
                        type: 'success',
                        title: 'Update Footer Content',
                        text: 'Footer content has been updated'
                    });
                    this.loadContent();
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                });
            },
            loadContent(){
                axios.get('api/about/management?api_token='+window.token)
                .then(response => {
                    this.form.content = response.data.content;
                    this.form.id = response.data.id;
                });
            },

            loadFooterContent(){
                axios.get('api/footerContent?api_token='+window.token)
                .then(response => {
                    this.form.content_footer = response.data.content;
                });
            }
        },
        mounted() {
            this.loadContent();
            this.loadFooterContent();
        }
    }
</script>
