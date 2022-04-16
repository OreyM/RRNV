export const mutationTypes = {
    getPermissionsListStart: '[permissions] getPermissionsListStart',
    getPermissionsListSuccess: '[permissions] getPermissionsListSuccess',
    getPermissionsListFailure: '[permissions] getPermissionsListFailure',

    getSelectedPermissionsStart: '[permissions] getSelectedPermissionsStart',
    getSelectedPermissionsSuccess: '[permissions] getSelectedPermissionsSuccess',
    getSelectedPermissionsFailure: '[permissions] getSelectedPermissionsFailure',
}

const mutations = {
// Init permissions list
    [mutationTypes.getPermissionsListStart](state) {
        state.isLoading = true
        state.isTableDataLoading = true

        state.permissionsList = []

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.getPermissionsListSuccess](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false

        state.permissionsList = payload.permissions
    },
    [mutationTypes.getPermissionsListFailure](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    },
// Get selected permissions
    [mutationTypes.getSelectedPermissionsStart](state) {
        state.isLoading = true

        state.selectedPermissions = []

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.getSelectedPermissionsSuccess](state, payload) {
        state.isLoading = false

        state.selectedPermissions = payload.permissions
    },
    [mutationTypes.getSelectedPermissionsFailure](state, payload) {
        state.isLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    }
}

export default mutations
