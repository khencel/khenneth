<template>
   <div>
       {{footer}}
   </div>
</template>

<script>
    export default {
        data(){
            return{
                footer:'',
            }
        },
        mounted() {
            this.loadFooter();
        },
        methods: {
            loadFooter(){
                axios.get('api/footer')
                .then(response => {
                    this.footer = response.data.content;
                });
            }
        },
    }
</script>
