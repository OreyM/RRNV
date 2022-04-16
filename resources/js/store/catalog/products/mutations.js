export const mutationTypes = {
  getProductsListStart: '[products] getProductsListStart',
  getProductsListSuccess: '[products] getProductsListSuccess',
  getProductsListFailure: '[products] getProductsListFailure',

  changeProductStatusStart: '[product] changeProductStatusStart',
  changeProductStatusSuccess: '[product] changeProductStatusSuccess',
  changeProductStatusFailure: '[product] changeProductStatusFailure',

  deleteProductStart: '[product] deleteProductStart',
  deleteProductSuccess: '[product] deleteProductSuccess',
  deleteProductFailure: '[product] deleteProductFailure',
}

const mutations = {
  // Init products list
  [mutationTypes.getProductsListStart](state) {
    state.isLoading = true
    state.isTableDataLoading = true

    state.paginated = {}
    state.productsList = []
    state.productsCount = 0

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.getProductsListSuccess](state, payload) {
    state.isLoading = false
    state.isTableDataLoading = false

    const { data, links, meta } = payload
    state.paginated = { links, meta }
    state.productsList = data
    state.productsCount = meta.total
    state.currentPage = meta.current_page
  },
  [mutationTypes.getProductsListFailure](state, payload) {
    state.isLoading = false
    state.isTableDataLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Change status
  [mutationTypes.changeProductStatusStart](state) {
    state.isLoading = true
    state.isProductStatusChange = true
    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.changeProductStatusSuccess](state) {
    state.isLoading = false
    state.isProductStatusChange = false
  },
  [mutationTypes.changeProductStatusFailure](state, payload) {
    state.isLoading = false
    state.isProductStatusChange = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Delete product
  [mutationTypes.deleteProductStart](state) {
    state.isLoading = true

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.deleteProductSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.deleteProductFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
}

export default mutations
