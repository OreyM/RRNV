export const mutationTypes = {
    getStockStatusesListStart: '[stock-statuses] getStockStatusesListStart',
    getStockStatusesListSuccess: '[stock-statuses] getStockStatusesListSuccess',
    getStockStatusesListFailure: '[stock-statuses] getStockStatusesListFailure',

    createStockStatusStart: '[stock-status] createStockStatusStart',
    createStockStatusSuccess: '[stock-status] createStockStatusSuccess',
    createStockStatusFailure: '[stock-status] createStockStatusFailure',

    updateStockStatusStart: '[stock-status] updateStockStatusStart',
    updateStockStatusSuccess: '[stock-status] updateStockStatusSuccess',
    updateStockStatusFailure: '[stock-status] updateStockStatusFailure',

    deleteStockStatusStart: '[stock-status] deleteStockStatusStart',
    deleteStockStatusSuccess: '[stock-status] deleteStockStatusSuccess',
    deleteStockStatusFailure: '[stock-status] deleteStockStatusFailure',
}

const mutations = {
// Init stock statuses list
    [mutationTypes.getStockStatusesListStart](state) {
        state.isLoading = true
        state.isTableDataLoading = true

        state.stockStatusesList = []
        state.stockStatusesCount = 0

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.getStockStatusesListSuccess](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false

        state.stockStatusesList = payload.data
        state.stockStatusesCount = payload.count
    },
    [mutationTypes.getStockStatusesListFailure](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    },
// Create stock status
    [mutationTypes.createStockStatusStart](state) {
        state.isLoading = true

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.createStockStatusSuccess](state) {
        state.isLoading = false
    },
    [mutationTypes.createStockStatusFailure](state, payload) {
        state.isLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    },
// Update stock status
    [mutationTypes.updateStockStatusStart](state) {
        state.isLoading = true

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.updateStockStatusSuccess](state) {
        state.isLoading = false
    },
    [mutationTypes.updateStockStatusFailure](state, payload) {
        state.isLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    },
// Delete stock status
    [mutationTypes.deleteStockStatusStart](state) {
        state.isLoading = true

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.deleteStockStatusSuccess](state) {
        state.isLoading = false
    },
    [mutationTypes.deleteStockStatusFailure](state, payload) {
        state.isLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    }
}

export default mutations
