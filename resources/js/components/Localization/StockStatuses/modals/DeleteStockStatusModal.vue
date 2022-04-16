<template>
    <b-modal
        id="delete-stock-status-modal"
        size="md"
        centered
        title="Delete Stock status"
    >
        You are going to <strong class="text-danger">delete</strong> stock status:
        <strong>{{ selectedStockStatus.statusName }}</strong>.
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
    import { actionTypes as stockStatusesAction } from
            '../../../../store/localization/stock-statuses/actions'

    export default {
        name: 'DeleteStockStatusModal',

        props: ['selectedStockStatus'],

        computed: {
            ...mapState({
                isLoading: (state) => state.stock_statuses.isLoading,
                stockStatusesList: (state) => state.stock_statuses.stockStatusesList,
            }),
        },

        methods: {
            onDelete() {
                this.$store.dispatch(stockStatusesAction.deleteStockStatus, this.selectedStockStatus.id)
                    .then(() => {
                        const index = this.stockStatusesList.indexOf(this.selectedStockStatus)
                        this.$store.state.stock_statuses.stockStatusesList.splice(index, 1)
                }).then(() => {
                    this.$nextTick(() => {
                        this.$bvModal.hide('delete-stock-status-modal')
                    })
                })
            },
        }
    }
</script>

<style scoped>

</style>
