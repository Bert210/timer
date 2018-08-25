<template>
    <div class="card">
        <div :class="[cardHeaderClass, cardHeaderBackground]">
            <div class="row">
                <div class="col-6">
                    <h4 class="font-weight-bold">1234</h4>
                </div>
                <div class="col-6 text-right">
                    <h4><span class="badge badge-light">Service Wash</span></h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6"><h2>{{timeView}}</h2></div>
                <div class="col-6 text-right">
                    <div class="btn btn-dark">Start Job</div>
                </div>
            </div>
        <hr class="mb-0">
        <div class="text-muted font-italic small float-right">Create at 11/12/14 12:14PM</div>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            // setInterval(this.updateTimer, 1000);
        },

        data: function() {
            return ({
                cardHeaderClass: "card-header",
                cardHeaderBackground: "bg-success",
                time: {
                    hours: 0,
                    minutes: 0,
                    seconds: 0,
                }
            });
        },

        methods: {
            updateTimer: function() {
                this.time.seconds++;
                if(this.time.seconds >= 60){
                    this.time.minutes++;
                    this.time.seconds = 0;
                    if(this.time.minutes >= 60){
                        this.time.hours++;
                        this.time.minues = 0;
                    }
                }
            }
        },

        computed: {
            timeView: function(){
                return this.time.hours + ":" + this.time.minutes + ":" + this.time.seconds;
                
            },
            cardBackground: function(){
                return (this.time.minutes >= 15 ? this.cardHeaderBackground = "bg-danger" : (this.time.minutes >= 10 ? this.cardHeaderBackground = "bg-warning" : this.cardHeaderBackground = "bg-success"));
            }
        }
    }
</script>
