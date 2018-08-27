<template>

    <Card
        :stockTagNumber="this.data.stock_tag_number"
        :type="this.data.type"
        :vip="this.data.vip"
        badgeBackground="badge-dark"
    >
        <div class="col-4">
            <div>In Queue:</div>
            <div>
                <TimeFormatter
                    :time="this.data.queue_time"
                ></TimeFormatter>
            </div>
        </div>
        <div class="col-4">
            <div>Processing:</div>
            <div>
                <TimeFormatter
                    :time="this.data.processing_time"
                ></TimeFormatter>
            </div>
        </div>
        <div class="col-4">
            <div>Total Time:</div>
            <div>
                <TimeFormatter
                    :time="this.data.total_time"
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
    }
</script>
