export const mutationTypes = {
  // getStockStatusesListStart: '[stock-statuses] getStockStatusesListStart',
  // getStockStatusesListSuccess: '[stock-statuses] getStockStatusesListSuccess',
  // getStockStatusesListFailure: '[stock-statuses] getStockStatusesListFailure',

  getTaxRatesSelectionStart: '[tax-rates] getTaxRatesSelectionStart',
  getTaxRatesSelectionSuccess: '[tax-rates] getTaxRatesSelectionSuccess',
  getTaxRatesSelectionFailure: '[tax-rates] getTaxRatesSelectionFailure',

  // createStockStatusStart: '[stock-status] createStockStatusStart',
  // createStockStatusSuccess: '[stock-status] createStockStatusSuccess',
  // createStockStatusFailure: '[stock-status] createStockStatusFailure',
  //
  // updateStockStatusStart: '[stock-status] updateStockStatusStart',
  // updateStockStatusSuccess: '[stock-status] updateStockStatusSuccess',
  // updateStockStatusFailure: '[stock-status] updateStockStatusFailure',
  //
  // deleteStockStatusStart: '[stock-status] deleteStockStatusStart',
  // deleteStockStatusSuccess: '[stock-status] deleteStockStatusSuccess',
  // deleteStockStatusFailure: '[stock-status] deleteStockStatusFailure',
}

const mutations = {
  // Init tax rates list
  //     [mutationTypes.getStockStatusesListStart](state) {
  //         state.isLoading = true
  //         state.isTableDataLoading = true
  //
  //         state.stockStatusesList = []
  //         state.stockStatusesCount = 0
  //
  //         state.error = null
  //         state.errorDebug = null
  //     },
  //     [mutationTypes.getStockStatusesListSuccess](state, payload) {
  //         state.isLoading = false
  //         state.isTableDataLoading = false
  //
  //         state.stockStatusesList = payload.data
  //         state.stockStatusesCount = payload.count
  //     },
  //     [mutationTypes.getStockStatusesListFailure](state, payload) {
  //         state.isLoading = false
  //         state.isTableDataLoading = false
  //         state.error = payload.error
  //         state.errorDebug = payload.error_debug
  //     },

  // Tax Rates for select tag
  [mutationTypes.getTaxRatesSelectionStart](state) {
    state.isLoading = true

    state.taxRatesSelection = []

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.getTaxRatesSelectionSuccess](state, payload) {
    state.isLoading = false

    state.taxRatesSelection = payload.data
  },
  [mutationTypes.getTaxRatesSelectionFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },

  // Create tax rate
  //     [mutationTypes.createStockStatusStart](state) {
  //         state.isLoading = true
  //
  //         state.error = null
  //         state.errorDebug = null
  //     },
  //     [mutationTypes.createStockStatusSuccess](state) {
  //         state.isLoading = false
  //     },
  //     [mutationTypes.createStockStatusFailure](state, payload) {
  //         state.isLoading = false
  //         state.error = payload.error
  //         state.errorDebug = payload.error_debug
  //     },
  // Update tax rate
  //     [mutationTypes.updateStockStatusStart](state) {
  //         state.isLoading = true
  //
  //         state.error = null
  //         state.errorDebug = null
  //     },
  //     [mutationTypes.updateStockStatusSuccess](state) {
  //         state.isLoading = false
  //     },
  //     [mutationTypes.updateStockStatusFailure](state, payload) {
  //         state.isLoading = false
  //         state.error = payload.error
  //         state.errorDebug = payload.error_debug
  //     },
  // Delete tax rate
  //     [mutationTypes.deleteStockStatusStart](state) {
  //         state.isLoading = true
  //
  //         state.error = null
  //         state.errorDebug = null
  //     },
  //     [mutationTypes.deleteStockStatusSuccess](state) {
  //         state.isLoading = false
  //     },
  //     [mutationTypes.deleteStockStatusFailure](state, payload) {
  //         state.isLoading = false
  //         state.error = payload.error
  //         state.errorDebug = payload.error_debug
  //     }
}

export default mutations
