<template>
    <div class="meaning-style">
        <strong style="font-size:25px;">{{name}}</strong>
        <p class="mt-3" style="font-style:25px;">
            {{meaning}}
        </p>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name:'',
                meaning:'',
                current_date:new Date(),
            }
        },
        methods:{
            loadDailyHex(){
                axios.post('https://qimen.jennelcheng.com/api/get-home-chart',{month:this.current_date.getMonth()+1,day:this.current_date.getDate(),year:this.current_date.getFullYear()})
                .then(response => {
                    axios.post('/api/user/hexagram',{element:response.data.day_chart.element.name,english:response.data.day_chart.english.name})
                    .then(res => {
                        this.name = res.data.name;
                        this.meaning = res.data.meaning;
                    });
                });
            },
        },
        mounted() {
            this.loadDailyHex();
        }
    }
</script>

