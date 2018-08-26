<template>

    <Card
        :stockTagNumber="this.data.stock_tag_number"
        :type="this.data.type"
        :headerBackground="this.setHeaderBackground()"
        badgeBackground="badge-light"
    >

        <div class="col-6">
            <h2>
                <TimeFormatter
                    :time="time"
                ></TimeFormatter>
            </h2>
        </div>

        <div class="col-6 text-right">
            <div class="btn btn-dark" @click="startJob">Start Job</div>
        </div>
        
        <p slot="footer">Queue Time: {{ this.data.created_at }}</p>
    </Card>

</template>


<script>
    import Card from "./Card.vue";
    import TimeFormatter from "../Util/Formatters/TimeFormatter.vue";

    export default {
        components: { Card, TimeFormatter},
        props: [ "data", "updateList" ],
        mounted() {
            setInterval(this.timeDiff, 250);
        },

        data: function() {
            return {
                startTime: +new Date(this.data.created_at_timezone),
                time: Date.now() - +new Date(this.data.created_at_timezone),
            }
        },

        methods: {
            timeDiff: function(){
                this.time = Date.now() - this.startTime;
                this.setHeaderBackground();
            },
            startJob: function(){
                let vm = this;

                axios.post(`/jobs/${this.data.id}/startJob`, {
                    timeStarted: Date.now(),
                })
                .then(function (res){
                    // console.dirxml(res.data);
                    vm.updateList();
                })
                .catch(function (err){

                });
            },
            setHeaderBackground: function(){
                if(this.time >= 15 * 60 * 1000){
                    return "bg-danger";
                }else if(this.time >= 10  * 60 * 1000){
                    return "bg-warning";
                }
                return "bg-success";
            }
        },

        computed: {
            // time: function(){
            //     return Date.now()- new Date(this.data.created_at_timezone);
            // }
        }
    }
</script>
