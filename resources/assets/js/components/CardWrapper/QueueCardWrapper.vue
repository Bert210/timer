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
    mounted: function() {
        this.getQueueCards();
        setInterval(this.getQueueCards, 5000);
    },
    data: () => ({
        queueCards: [],
    }),

    methods: {
        getQueueCards: function(){
            let vm = this;

            axios.get('/jobs/queued')
            .then( function(res){
                vm.queueCards = res.data;
            });
        }
    }
}
</script>

