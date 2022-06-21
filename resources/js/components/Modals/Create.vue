<template>
    <div>
        <v-dialog
            v-model="dialog"
            persistent
            max-width="600px"
        >
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    color="primary"
                    dark
                    block
                    v-bind="attrs"
                    v-on="on"
                >
                    Add Office
                </v-btn>
            </template>
            <v-card>
                <v-card-title>
                    <span class="text-h5">Add item</span>
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
                                    v-model="params.name"
                                ></v-text-field>
                                <span class="text-danger">{{ errors.first('title') }}</span>
                            </v-col>
                            <v-col
                                cols="12">
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
                        @click="create"
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
    name: "Create",
    data() {
        return {
            dialog: false,
            location: null,
            params: {
                name: '',
            }
        }
    },
    computed: {
        locations() {
            return this.$store.getters.getLocations
        }
    },
    methods: {
        async create() {
            let validate = await this.$validator.validateAll()
            if (validate) {
                this.params.location_id = this.location.map(location => location.id)
                let response = await this.$store.dispatch('create', this.params)
                if (response?.type === 'success') {
                    alert.$emit('alert', response)
                    await this.$store.dispatch('getAll')
                    this.params = {
                        name: '',
                    }
                    this.location = null
                    this.dialog = false
                }
            }
        }
    }
}
</script>
