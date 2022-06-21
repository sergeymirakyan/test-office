<template>
    <v-card
        outlined>
        <v-list-item three-line>
            <v-list-item-content>
                <v-list-item-title class="text-h5 mb-1">
                    {{item.name}}
                </v-list-item-title>
            </v-list-item-content>
        </v-list-item>

        <v-card-actions>
            <v-btn
                outlined
                rounded
                depressed
                @click="update"
                text
            >
                Edit
            </v-btn>

            <v-btn
                rounded
                depressed
                @click="remove"
                color="error"
            >
                Remove
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    name: "Item",
    props: {
        item: {
            required: true
        }
    },
    computed: {
        items() {
            return this.$store.getters.getOffices
        }
    },
    methods: {
        async remove() {
            let response = await this.$store.dispatch('remove', this.item.id)
            alert.$emit('alert', response)
            if(response?.type === 'success') await this.$store.dispatch('getAll')
        },
        update() {
            alert.$emit('update_item', this.item)
        }
    },
}
</script>
