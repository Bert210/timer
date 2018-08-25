<template>
    <div class="card">
        <div class="card-header justify-content-space-around">
            Processing - <span class="badge badge-primary">{{ processingCards.length }}</span>
            
        </div>

        <div class="card-body">
            <ProcessingCard v-for="(processingCard, index) in processingCards" v-bind:key="index"
                    :data="processingCard"
                    :updateList="getInProcessingCards"
            ></ProcessingCard> 
        </div>
    </div>
</template>

<script>
import ProcessingCard from "../Cards/ProcessingCard.vue";

export default {
    components: { ProcessingCard },
    mounted: function() {
        this.getInProcessingCards();
        setInterval(this.getInProcessingCards, 5000);
    },
    data: () => ({
        processingCards: [],
    }),

    methods: {
        getInProcessingCards: function() {
            console.log("getInProcessingCards");
            let vm = this;

            axios.get('/jobs/inProgress')
            .then( function(res){
                vm.processingCards = res.data;
            });
        }
    }
}
</script>

