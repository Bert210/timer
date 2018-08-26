<template>
    <div class="card">
        <div class="card-header justify-content-space-around">
            Processing - <span class="badge badge-primary">{{ completedCards.length }}</span>
            
        </div>

        <div class="card-body">
            <CompletedCard v-for="(completedCard, index) in completedCards" v-bind:key="index"
                    :data="completedCard"
                    :updateList="getCompletedCards"
            ></CompletedCard> 
        </div>
    </div>
</template>

<script>
import CompletedCard from "../Cards/CompletedCard.vue";

export default {
    components: { CompletedCard },
    mounted: function() {
        this.getCompletedCards();
        setInterval(this.getCompletedCards, 5000);
    },
    data: () => ({
        completedCards: [],
    }),

    methods: {
        getCompletedCards: function() {
            console.log("getCompletedCards");
            let vm = this;

            axios.get('/jobs/completed')
            .then( function(res){
                vm.completedCards = res.data;
            });
        }
    }
}
</script>

