import { default as api } from '../../api/roles'
import { mutationTypes } from './mutations'
import toast from '../../helpers/toast'
import { debug } from '../../helpers/debug'

export const actionTypes = {
    init: '[roles] init',
    selection: '[roles] selection',
    createRole: '[role] createRole',
    updateRole: '[role] updateRole',
    deleteRole: '[role] deleteRole'
}

const actions = {
    [actionTypes.init](context) {
        return new Promise(() => {
            context.commit(mutationTypes.getRolesListStart)
            api.all()
                .then((response) => {
                    context.commit(
                        mutationTypes.getRolesListSuccess,
                        response.data.roles
                    )
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    context.commit(mutationTypes.getRolesListFailure, e.response.data)
                    toast.error(e.response.data.error)
                })
        })
    },

    [actionTypes.selection](context) {
        return new Promise(() => {
            context.commit(mutationTypes.getRolesListStart)
            api.selection()
                .then((response) => {
                    context.commit(
                        mutationTypes.getRolesListSuccess,
                        response.data.roles
                    )
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    context.commit(mutationTypes.getRolesListFailure, e.response.data)
                    toast.error(e.response.data.error)
                })
        })
    },

    [actionTypes.createRole](context, credentials) {
        return new Promise((resolve) => {
            context.commit(mutationTypes.createRoleStart)

            api.createRole(credentials)
                .then((response) => {
                    context.commit(mutationTypes.createRoleSuccess)
                    toast.success(response.data.success)
                    resolve(response.data)
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    toast.error(e.response.data.error)
                    context.commit(mutationTypes.createRoleFailure, e.response.data)
                })
        })
    },

    [actionTypes.updateRole](context, credentials) {
        return new Promise((resolve) => {
            context.commit(mutationTypes.updateRoleDataStart)

            api.updateRole(credentials)
                .then((response) => {
                    context.commit(mutationTypes.updateRoleDataSuccess)
                    toast.success(response.data.success)
                    resolve(response.data)
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    toast.error(e.response.data.error)
                    context.commit(mutationTypes.deleteRoleFailure, e.response.data)
                })
        })
    },

    [actionTypes.deleteRole](context, credential) {
        return new Promise((resolve) => {
            context.commit(mutationTypes.deleteRoleStart)

            api.deleteRole(credential)
                .then((response) => {
                    context.commit(mutationTypes.deleteRoleSuccess)
                    toast.success(response.data.success)
                    resolve(response.data)
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    toast.error(e.response.data.error)
                    context.commit(mutationTypes.deleteRoleFailure, e.response.data)
                })
        })
    }
}

export default actions
