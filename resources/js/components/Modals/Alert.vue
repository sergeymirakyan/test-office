<template>
    <v-card v-if="show" class="alert-message" :elevation="6">
        <p class="ma-0">{{message}}</p>
        <i v-if="type == 'success'" class="far fa-check-circle ml-10 text-success"></i>
        <i v-else class="far fa-times-circle ml-10 text-danger"></i>
    </v-card>
</template>

<script>
export default {
    name: "Alert",
    data() {
        return {
            type: null,
            message: null,
            show: false
        }
    },
    created() {
        alert.$on('alert', data => {
            this.type = data.type
            this.message = data.message
            this.show = true
            let timed = setTimeout(() => {
                this.show = false
                clearTimeout(timed)
            }, 4000)
        })
    }
}
</script>

<style lang="scss" scoped>
.alert-message {
    background-color: white;
    position: absolute;
    left: 10px;
    bottom: 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 30px;
    z-index: 9999;
}
</style>
