<template>
    <b-modal
        id="delete-manufacturer-modal"
        size="md"
        centered
        title="Delete Manufacturer"
    >
        You are going to <strong class="text-danger">delete</strong> manufacturer:
        <strong>{{ selectedManufacturer.manufacturerName }}</strong>.
        Are you sure?

        <template #modal-footer="{ ok, cancel, hide }">
            <b-button
                size="sm"
                variant="danger"
                @click="cancel()"
                :disabled="isLoading"
            >
                Go back
            </b-button>
            <b-button
                size="sm"
                variant="success"
                @click="onDelete"
                :disabled="isLoading"
            >
                <span v-if="isLoading">
                    <b-spinner small type="grow"></b-spinner>
                    Execute...
                </span>
                <span v-else>I'm sure</span>
            </b-button>
        </template>
    </b-modal>
</template>

<script>
    import { mapState } from 'vuex'
    import { actionTypes as manufacturersAction } from '../../../../store/catalog/manufacturers/actions'

    export default {
        name: 'DeleteManufacturerModal',

        props: ['selectedManufacturer'],

        computed: {
            ...mapState({
                isLoading: (state) => state.manufacturers.isLoading,
                manufacturersList: (state) => state.manufacturers.manufacturersList,
            }),
        },

        methods: {
            onDelete() {
                this.$store.dispatch(manufacturersAction.deleteManufacturer, this.selectedManufacturer.id)
                    .then(() => {
                        const index = this.manufacturersList.indexOf(this.selectedManufacturer)
                        this.$store.state.manufacturers.manufacturersList.splice(index, 1)
                }).then(() => {
                    this.$nextTick(() => {
                        this.$bvModal.hide('delete-manufacturer-modal')
                    })
                })
            },
        }
    }
</script>

<style scoped>

</style>
