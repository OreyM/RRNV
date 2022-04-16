<template>
    <b-modal
        id="create-stock-status-modal"
        size="md"
        title="Create Stock Status"
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
                                    v-model="creationStockStatus.name"
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
                        @click="onCreate"
                        :disabled="isLoading"
                    >
                        <span v-if="isLoading">
                            <b-spinner small type="grow"></b-spinner>
                            Execute...
                        </span>
                        <span v-else>Create</span>
                    </b-button>
                </div>
            </div>
        </div>
    </b-modal>
</template>

<script>
    import { mapState } from 'vuex'
    import { actionTypes as stockStatusesAction } from '../../../../store/localization/stock-statuses/actions'

    export default {
        name: 'CreateStockStatusModal',

        data() {
            return {
                creationStockStatus: { name: '' }
            }
        },

        computed: {
            ...mapState({
                isLoading: (state) => state.stock_statuses.isLoading,
            }),
        },

        methods: {
            onCreate() {
                this.$store.dispatch(stockStatusesAction.createStockStatus, this.creationStockStatus)
                .then(() => {
                    this.$store.dispatch(stockStatusesAction.init)
                })
            }
        }
    }
</script>

<style scoped>

</style>
