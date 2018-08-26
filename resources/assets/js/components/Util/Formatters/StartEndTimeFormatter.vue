<template>
    <TimeFormatter
        :time="timeDiff"
    ></TimeFormatter>
</template>

<script>
import TimeFormatter from './TimeFormatter.vue';

export default {
    props: ['startTime', 'endTime'],
    components: { TimeFormatter },
    mounted: function(){
        // console.log(this.startTime, this.endTime);
    },
    computed: {
        timeDiff: function(){
            let sTime = Date.parse(this.startTime);
            let eTime = Date.parse(this.endTime);

            if(isNaN(sTime)){
                sTime = parseInt(this.startTime);
            }

            if(isNaN(eTime)){
                eTime = parseInt(this.endTime);
            }

            return eTime - sTime;
        }
    },
}
</script>

