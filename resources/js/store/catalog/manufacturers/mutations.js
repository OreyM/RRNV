export const mutationTypes = {
  getManufacturersStart: '[manufacturers] getManufacturersStart',
  getManufacturersSuccess: '[manufacturers] getManufacturersSuccess',
  getManufacturersFailure: '[manufacturers] getManufacturersFailure',

  createManufacturerStart: '[manufacturer] createManufacturerStart',
  createManufacturerSuccess: '[manufacturer] createManufacturerSuccess',
  createManufacturerFailure: '[manufacturer] createManufacturerFailure',

  updateManufacturerStart: '[manufacturer] updateManufacturerStart',
  updateManufacturerSuccess: '[manufacturer] updateManufacturerSuccess',
  updateManufacturerFailure: '[manufacturer] updateManufacturerFailure',

  deleteManufacturerStart: '[manufacturer] deleteManufacturerStart',
  deleteManufacturerSuccess: '[manufacturer] deleteManufacturerSuccess',
  deleteManufacturerFailure: '[manufacturer] deleteManufacturerFailure',
}

const mutations = {
  // Init manufacturers list
  [mutationTypes.getManufacturersStart](state) {
    state.isLoading = true
    state.isTableDataLoading = true

    state.manufacturersList = []
    state.manufacturersCount = 0

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.getManufacturersSuccess](state, payload) {
    state.isLoading = false
    state.isTableDataLoading = false

    state.manufacturersList = payload.data
    state.manufacturersCount = payload.count
  },
  [mutationTypes.getManufacturersFailure](state, payload) {
    state.isLoading = false
    state.isTableDataLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Create manufacturer
  [mutationTypes.createManufacturerStart](state) {
    state.isLoading = true

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.createManufacturerSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.createManufacturerFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Update manufacturer
  [mutationTypes.updateManufacturerStart](state) {
    state.isLoading = true

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.updateManufacturerSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.updateManufacturerFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Delete manufacturer
  [mutationTypes.deleteManufacturerStart](state) {
    state.isLoading = true

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.deleteManufacturerSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.deleteManufacturerFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
}

export default mutations
