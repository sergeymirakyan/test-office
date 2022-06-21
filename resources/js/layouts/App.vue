<template>
    <v-app>
        <v-container>
            <Create />
            <Alert />
            <Update />

            <v-row class="mt-40">
                <v-col v-for="(item, key) in offices" :key="key" cols="12" sm="6" md="3">
                    <Item :item="item" />
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
import Create from "../components/Modals/Create";
import Alert from "../components/Modals/Alert"
import Update from "../components/Modals/Update";

export default {
    name: "App",
    components: {
        Create,
        Alert,
        Update
    },
    computed: {
        offices() {
            return this.$store.getters.getOffices
        }
    },
    created() {
        this.$store.dispatch('getAll')
        this.$store.dispatch('getAllLocations')
    }
}
</script>
