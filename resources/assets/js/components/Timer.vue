<template>
    <div class="row">
        <div class="col-sm-12 col-lg-4">
            <QueueCardWrapper
                :updateQueue="updateQueue"
            ></QueueCardWrapper>            
        </div>
        <div class="col-sm-12 col-lg-4">
            <ProcessingCardWrapper
                :updateProcessing="updateProcessing"            
            ></ProcessingCardWrapper>
        </div>
        <div class="col-sm-12 col-lg-4">
            <CompletedCardWrapper
                :updateComplete="updateComplete"
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
        console.log("Mounted")
        setInterval(this.updateAll, 1000);
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
