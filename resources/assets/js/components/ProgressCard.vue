<template>

    <Card
        :stockTagNumber="this.data.stock_tag_number"
        :type="this.data.type_id"
        :headerBackground="this.setHeaderBackground()"
    >

        <div class="col-6">
            <h2>
                <TimeFormatter
                    :time="time"
                ></TimeFormatter>
            </h2>
        </div>

        <div class="col-6 text-right">
            <div class="btn btn-dark" @click="">Complete Job</div>
        </div>
        
        <p slot="footer">Started by {{this.data.employee_id}}</p>
    </Card>

</template>


<script>
    import Card from "./Card.vue";
    import TimeFormatter from "./TimeFormatter.vue";

    export default {
        name: "ProgressCard",
        components: { Card, TimeFormatter},
        props: [ "data" ],
        mounted() {
            setInterval(this.timeDiff, 250);
        },

        data: function() {
            return {
                startTime: +new Date(this.data.queue),
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
            }
        },

        computed: {
        }
    }
</script>
