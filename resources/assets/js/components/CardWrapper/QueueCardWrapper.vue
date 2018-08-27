<template>
    <div class="card">
                <div class="card-header justify-content-space-around">
                    Queue - <span class="badge badge-primary">{{ queueCards.length }}</span>
                     
                </div>

                <div class="card-body">
                    <QueueCard v-for="(queueCard, index) in queueCards" v-bind:key="index"
                            :data="queueCard"
                            :updateList="getQueueCards"
                    ></QueueCard> 
                </div>
            </div>
    </div>
</template>

<script>
import QueueCard from "../Cards/QueueCard.vue";

export default {
    components: { QueueCard },
    props: ["updateQueue", "updateTimer"],
    mounted: function() {
        this.getQueueCards();
        this.updateQueue(this.getQueueCards);
    },
    data: function () {
        return ({
            queueCards: [],
        })
    },

    methods: {
        getQueueCards: function(){
            let vm = this;

            axios.get('/jobs/queued')
            .then( function(res){
                vm.queueCards = [];
                vm.queueCards = res.data;
            });

            // this.updateTimer();

        }
    }
}
</script>

