export const mutationTypes = {
    mutationStart: '[alias] mutationStart',
    mutationSuccess: '[alias] mutationSuccess',
    mutationFailure: '[alias] mutationFailure',
}

const mutations = {
// Mytation union
    [mutationTypes.mutationStart](state) {
        state.isLoading = true
        state.isTableDataLoading = true

        state.stateList = []
        state.stateCount = 0

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.mutationSuccess](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false

        state.stateList = payload.data
        state.stateCount = payload.count
    },
    [mutationTypes.mutationFailure](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    }
}

export default mutations
