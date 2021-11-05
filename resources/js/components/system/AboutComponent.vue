<template>
   <div id="about" class="">
       <div class="row p-5 justify-content-center" style="min-height:300px;">
           <div class="col-md-6 text-center">
                <h2>About Us</h2>
                <p>{{content}}</p>
           </div>
        </div>
   </div>
</template>

<script>
    export default {
        data(){
            return {
                content:''
            }
        },
        methods:{
            loadContent(){
                axios.get('api/about')
                .then(response => {
                    this.content = response.data.content
                });
            }
        },
        mounted() {
            this.loadContent();
        }
    }
</script>
