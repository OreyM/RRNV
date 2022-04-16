<template>
    <b-modal
        id="edit-stock-status-modal"
        size="md"
        title="Edit Stock Status"
        hide-footer
    >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Stock Status data</h4>
                    <div class="card">
                        <div class="card-body">
                            <b-form-group
                                label="Stock Status name:"
                                label-for="stock-status-name"
                            >
                                <b-form-input
                                    id="stock-status-name"
                                    name="stock-status-name"
                                    v-model="selectedStockStatus.statusName"
                                    type="text"
                                    placeholder="Stock Status display name"
                                    :disabled="isLoading"
                                    required
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
    import { actionTypes as stockStatusesAction } from
            '../../../../store/localization/stock-statuses/actions'

    export default {
        name: 'EditStockStatusModal',

        props: ['selectedStockStatus'],

        computed: {
            ...mapState({
                isLoading: (state) => state.stock_statuses.isLoading,
            }),
        },

        methods: {
            onUpdate() {
                this.$store.dispatch(stockStatusesAction.updateStockStatus, this.selectedStockStatus)
            }
        }
    }
</script>

<style scoped>

</style>
