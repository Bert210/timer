<template>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <QueueCardWrapper
                :updateQueue="updateQueue"
                :updateTimer="updateAll"
            ></QueueCardWrapper>            
        </div>
        <div class="col-sm-12 col-lg-4">
            <ProcessingCardWrapper
                :updateProcessing="updateProcessing"
                :updateTimer="updateAll"
            ></ProcessingCardWrapper>
        </div>
        <div class="col-sm-12 col-lg-4">
            <CompletedCardWrapper
                :updateComplete="updateComplete"
                :updateTimer="updateAll"
            ></CompletedCardWrapper>
        </div>
    </div>
</template>


<script>

import QueueCardWrapper from './CardWrapper/QueueCardWrapper.vue';
import ProcessingCardWrapper from './CardWrapper/ProcessingCardWrapper.vue';
import CompletedCardWrapper from './CardWrapper/CompletedCardWrapper.vue';

export default {
    components: { QueueCardWrapper, ProcessingCardWrapper, CompletedCardWrapper},
    mounted: function() {
        setInterval(this.updateAll, 2000);
    },

    data: function() {
        return ({
            updateQueueCallback: null,
            updateProcessingCallback: null,
            updateCompleteCallback: null,
        })
    },
    methods: {
        updateAll: function(){
            console.log("Updating all!");
            this.updateQueueCallback();
            this.updateProcessingCallback();
            this.updateCompleteCallback();
        },
        updateQueue: function(updateCallback){
            this.updateQueueCallback = updateCallback;
        },
        updateProcessing: function(updateCallback){ 
            this.updateProcessingCallback = updateCallback;
        },
        updateComplete: function(updateCallback){
            this.updateCompleteCallback = updateCallback;
        }
    }
}
</script>
