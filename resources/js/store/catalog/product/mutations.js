export const mutationTypes = {
  createProductStart: '[product] createProductStart',
  createProductSuccess: '[product] createProductSuccess',
  createProductFailure: '[product] createProductFailure',

  getProductAliasStart: '[product] getProductAliasStart',
  getProductAliasSuccess: '[product] getProductAliasSuccess',
  getProductAliasFailure: '[product] getProductAliasFailure',

  getNetPriceStart: '[product] getNetPriceStart',
  getNetPriceSuccess: '[product] getNetPriceSuccess',
  getNetPriceFailure: '[product] getNetPriceFailure',
}

const mutations = {
  // Create product
  [mutationTypes.createProductStart](state) {
    state.error = null
    state.errorDebug = null
    state.isLoading = true
  },
  [mutationTypes.createProductSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.createProductFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },

  // Generate product alias
  [mutationTypes.getProductAliasStart](state) {
    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.getProductAliasSuccess](state, payload) {
    const { alias, isError = false, error = '' } = payload
    state.current.alias.value = alias
    state.current.alias.isError = isError
    state.current.alias.error = error
  },
  [mutationTypes.getProductAliasFailure](state, payload) {
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },

  // Get net price
  [mutationTypes.getNetPriceStart](state) {
    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.getNetPriceSuccess](state, payload) {
    state.current.netPrice = payload.net_price
  },
  [mutationTypes.getNetPriceFailure](state, payload) {
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
}

export default mutations
