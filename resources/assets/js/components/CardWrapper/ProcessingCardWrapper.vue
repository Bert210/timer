<template>
    <div class="card">
        <div class="card-header justify-content-space-around">
            Processing - <span class="badge badge-primary">{{ processingCards.length }}</span>
            
        </div>

        <div class="card-body">
            <ProcessingCard v-for="(processingCard, index) in processingCards" v-bind:key="index"
                    :data="processingCard"
                    :startTime="processingCard.queue"
                    :updateList="getInProcessingCards"
            ></ProcessingCard> 
        </div>
    </div>
</template>

<script>
import ProcessingCard from "../Cards/ProcessingCard.vue";

export default {
    name: 'ProcessingCardWrapper',
    props: ['updateProcessing', 'updateAll'],
    components: { ProcessingCard },
    mounted: function() {
        this.getInProcessingCards();
        this.updateProcessing(this.getInProcessingCards);
    },
    data: function() {
        return ({
            processingCards: [],    
        })
    },

    methods: {
        getInProcessingCards: function() {
            let vm = this;

            axios.get('/jobs/inProgress')
            .then( function(res){
                // vm.processingCards = new Array();
                vm.processingCards = res.data;
                // vm.updateAll();
            });

        }
    }
}
</script>

