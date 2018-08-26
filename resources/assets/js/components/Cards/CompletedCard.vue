<template>

    <Card
        :stockTagNumber="this.data.stock_tag_number"
        :type="this.data.type"
        badgeBackground="badge-dark"
    >
        <div class="col-4">
            <div>In Queue:</div>
            <div>
                <TimeFormatter
                    :time="queueTime"
                ></TimeFormatter>
            </div>
        </div>
        <div class="col-4">
            <div>Processing:</div>
            <div>
                <TimeFormatter
                    :time="processTime"
                ></TimeFormatter>
            </div>
        </div>
        <div class="col-4">
            <div>Total Time:</div>
            <div>
                <TimeFormatter
                    :time="totalTime"
                ></TimeFormatter>
            </div>
        </div>
        
        <p slot="footer">Completed by {{ this.data.employee.name }}</p>
    </Card>

</template>


<script>
    import Card from "./Card.vue";
    import TimeFormatter from "../Util/Formatters/TimeFormatter.vue";

    export default {
        components: { Card, TimeFormatter },
        props: [ "data" ],

        computed: {
            queueTime: function(){
                let start = new Date(this.data.created_at_timezone);
                let end = new Date(this.data.queue);

                return end - start;
            },
            processTime: function(){
                let start = new Date(this.data.queue);
                let end = new Date(this.data.processing);
                
                return end - start;

            },
            totalTime: function(){
                let start = new Date(this.data.created_at_timezone);
                let end = new Date(this.data.processing);
                
                return end - start;
            }
        }
    }
</script>
