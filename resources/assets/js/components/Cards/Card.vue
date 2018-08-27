<template>
    <div class="card mb-3">
        <div :class="['card-header', headerBackground]">
            <div class="row align-items-center">
                <div class="col-6">
                    <h4 class="font-weight-bold">
                        <span v-if="vip"><span class="lnr lnr-star"></span></span>
                        {{ stockTagNumber }}</h4>
                </div>
                <div class="col-6 text-right">
                    <h4><span :class="['badge', badgeBackground]">{{ type.name }}</span></h4>
                </div>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <slot></slot>
            </div>
        <hr class="mb-0">
        <div class="text-muted font-italic small float-right"><slot name="footer"></slot></div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ["stockTagNumber", "type", "headerBackground", "badgeBackground", "vip"],
    }
</script>
