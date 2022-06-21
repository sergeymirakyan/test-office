<template>
    <div>
        <v-dialog
            v-model="dialog"
            persistent
            max-width="600px">
            <v-card>
                <v-card-title>
                    <span class="text-h5">Update Office</span>
                </v-card-title>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col
                                cols="12">
                                <v-text-field
                                    label="Title"
                                    name="title"
                                    v-validate="'required'"
                                    v-model="item.name"
                                ></v-text-field>
                                <span class="text-danger">{{ errors.first('name') }}</span>
                            </v-col>
                            <v-col cols="12">
                                <v-combobox
                                    v-model="location"
                                    label="Locations"
                                    :items="locations"
                                    item-text="address_1"
                                    item-value="id"
                                    solo
                                    multiple>
                                </v-combobox>
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        color="blue darken-1"
                        text
                        @click="dialog = false"
                    >
                        Close
                    </v-btn>
                    <v-btn
                        color="blue darken-1"
                        text
                        @click="update"
                    >
                        Save
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>

</template>

<script>
export default {
    name: "Update",
    data() {
        return {
            dialog: false,
            location: null,
            item: {
                name: '',
                locations: []
            }
        }
    },
    computed: {
        locations() {
            return this.$store.getters.getLocations
        }
    },
    methods: {
        async update() {
            this.item.location_id = this.location.map(location => location.id)
            let response = await this.$store.dispatch('update', this.item)
            alert.$emit('alert', response)
            this.dialog = false
            if(response?.type === 'success') await this.$store.dispatch('getAll')
        }
    },
    created() {
        alert.$on('update_item', data => {
            console.log(data, '[[[[[');
            this.item = data
            this.location = data.location
            this.dialog = true
        })
    }
}
</script>
