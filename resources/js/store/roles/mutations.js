export const mutationTypes = {
    getRolesListStart: '[roles] getRolesListStart',
    getRolesListSuccess: '[roles] getRolesListSuccess',
    getRolesListFailure: '[roles] getRolesListFailure',

    createRoleStart: '[role] createRoleStart',
    createRoleSuccess: '[role] createRoleSuccess',
    createRoleFailure: '[role] createRoleFailure',

    updateRoleDataStart: '[role] updateRoleDataStart',
    updateRoleDataSuccess: '[role] updateRoleDataSuccess',
    updateRoleDataFailure: '[role] updateRoleDataFailure',

    deleteRoleStart: '[role] deleteRoleStart',
    deleteRoleSuccess: '[role] deleteRoleSuccess',
    deleteRoleFailure: '[role] deleteRoleFailure',
}

const mutations = {
// Init roles list
    [mutationTypes.getRolesListStart](state) {
        state.isLoading = true
        state.isTableDataLoading = true

        state.rolesList = []
        state.rolesCount = 0

        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.getRolesListSuccess](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false

        state.rolesList = payload.data
        state.rolesCount = payload.count
    },
    [mutationTypes.getRolesListFailure](state, payload) {
        state.isLoading = false
        state.isTableDataLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    },
// Create new role
    [mutationTypes.createRoleStart](state) {
        state.isLoading = true
        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.createRoleSuccess](state) {
        state.isLoading = false
    },
    [mutationTypes.createRoleFailure](state, payload) {
        state.isLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    },
// Update role data
    [mutationTypes.updateRoleDataStart](state) {
        state.isLoading = true
        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.updateRoleDataSuccess](state) {
        state.isLoading = false
    },
    [mutationTypes.updateRoleDataFailure](state, payload) {
        state.isLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    },
// Delete role
    [mutationTypes.deleteRoleStart](state) {
        state.isLoading = true
        state.error = null
        state.errorDebug = null
    },
    [mutationTypes.deleteRoleSuccess](state) {
        state.isLoading = false
    },
    [mutationTypes.deleteRoleFailure](state, payload) {
        state.isLoading = false
        state.error = payload.error
        state.errorDebug = payload.error_debug
    }
}

export default mutations
