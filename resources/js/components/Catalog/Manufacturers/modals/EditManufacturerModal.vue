<template>
    <b-modal
        id="edit-manufacturer-modal"
        size="lg"
        title="Edit Manufacturer"
        hide-footer
    >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Manufacturer data</h4>
                    <div class="card">
                        <div class="card-body">
                            <b-form-group
                                label="Manufacturer name:"
                                label-for="manufacturer-name"
                            >
                                <b-form-input
                                    id="manufacturer-name"
                                    name="manufacturer-name"
                                    v-model="selectedManufacturer.manufacturerName"
                                    type="text"
                                    placeholder="Manufacturer display name"
                                    :disabled="isLoading"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group
                                label="Manufacturer image:"
                                label-for="manufacturer-image"
                            >
                                <b-form-input
                                    id="manufacturer-image"
                                    name="manufacturer-image"
                                    v-model="selectedManufacturer.image"
                                    type="text"
                                    placeholder="Manufacturer image"
                                    :disabled="isLoading"
                                ></b-form-input>
                            </b-form-group>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <b-button
                        size="sm"
                        variant="success"
                        @click="onUpdate"
                        :disabled="isLoading"
                    >
                        <span v-if="isLoading">
                            <b-spinner small type="grow"></b-spinner>
                            Execute...
                        </span>
                        <span v-else>Update</span>
                    </b-button>
                </div>
            </div>
        </div>
    </b-modal>
</template>

<script>
    import { mapState } from 'vuex'
    import { actionTypes as manufacturersAction } from '../../../../store/catalog/manufacturers/actions'

    export default {
        name: 'EditManufacturerModal',

        props: ['selectedManufacturer'],

        computed: {
            ...mapState({
                isLoading: (state) => state.manufacturers.isLoading,
            }),
        },

        methods: {
            onUpdate() {
                this.$store.dispatch(manufacturersAction.updateManufacturer, this.selectedManufacturer)
            }
        }
    }
</script>

<style scoped>

</style>
