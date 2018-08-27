<template>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Example select</label>
                    <select class="form-control" v-model="type" id="exampleFormControlSelect1">
                        <option v-for="type in types" v-bind:key="type.id" :value="type.id">{{ type.name }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Stock / Tag #</label>
                    <input type="text" v-model="stockTagNumber" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">VIN: (Optional)</label>
                    <input type="text" v-model="vin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                    <label for="vipCheckbox">VIP</label>
                    <input type="checkbox" v-model="vip" class="form-control" id="vipCheckbox" aria-describedby="emailHelp">
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" @click="createJob">Add Job</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['types'],
    data: function() {
        return ({
            type: '',
            stockTagNumber: '',
            vin: '',
            vip: false,
        });
    },
    methods: {
        reset(){
            this.type = '';
            this.stockTagNumber = '';
            this.vin = '';
            this.vip = false;
        },

        createJob: function(){
            let vm = this;
            axios.post('/jobs', 
            {
                type: this.type,
                stockTagNumber: this.stockTagNumber,
                vin: this.vin,
                vip: this.vip,
                startTime: Date.now(),
            })
            .then(function (response) {
                // console.dirxml(response.data);
                // vm.$emit('updateAll');
            })
            .catch(function (error) {
                console.log(error);
            });

            $('#exampleModal').modal('hide');
            this.reset();
        }
    }
}
</script>

