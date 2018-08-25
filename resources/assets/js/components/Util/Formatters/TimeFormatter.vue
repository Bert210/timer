<template>
    <p>{{ formatTime }}</p>
</template>


<script>
import moment from 'moment';

var momentDurationFormatSetup = require("moment-duration-format");

export default {
    props: ["time"],
    computed: {
        formatTime: function(){
            let duration = moment.duration(this.time).format("hh:mm:ss", { trim: false });
            
            return duration;
        }
    }
    
}
</script>
