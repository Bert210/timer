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
            <div class="btn btn-dark" @click="completeJob">Complete Job</div>
        </div>
        
        <p slot="footer">Started by {{ this.data.employee.name }}</p>
    </Card>

</template>


<script>
    import Card from "./Card.vue";
    import TimeFormatter from "../Util/Formatters/TimeFormatter.vue";

    export default {
        name: "ProcessingCard",
        components: { Card, TimeFormatter},
        props: [ "data", "updateList" ],
        mounted() {
            setInterval(this.timeDiff, 1000);
        },

        data: function() {
            return {
                startTime: new Date(this.data.queue),
                time: Date.now() - new Date(this.data.queue),
            }
        },

        methods: {
            timeDiff: function(){
                this.time = Date.now() - this.startTime;
            },
            setHeaderBackground: function(){
                if(this.time >= 15 * 60 * 1000){
                    return "bg-danger";
                }else if(this.time >= 10  * 60 * 1000){
                    return "bg-warning";
                }
                return "bg-success";
            },
            completeJob: function(){
                let vm = this;
                axios.post(
                    `/jobs/${this.data.id}/completedJob`,
                    { timeCompleted: Date.now() }
                ).then(function (res){
                    vm.updateList()
                }).catch(function (err) {
                    console.error(err);
                })


            },
        },

        computed: {
        }
    }
</script>
