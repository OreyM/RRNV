import { default as api } from '../../api/permissions'
import { mutationTypes } from './mutations'
import toast from '../../helpers/toast'
import { debug } from '../../helpers/debug'

export const actionTypes = {
    selection: '[permissions] selection',
    selected: '[permissions] selected'
}

const actions = {
    [actionTypes.selection](context) {
        return new Promise((resolve) => {
            context.commit(mutationTypes.getPermissionsListStart)
            api.selection()
                .then((response) => {
                    context.commit(
                        mutationTypes.getPermissionsListSuccess,
                        response.data
                    )
                    resolve(response.data)
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    context.commit(mutationTypes.getRolesListFailure, e.response.data)
                    toast.error(e.response.data.error)
                })
        })
    },
    [actionTypes.selected](context, credential) {
        return new Promise(() => {
            context.commit(mutationTypes.getSelectedPermissionsStart)
            api.selected(credential)
                .then((response) => {
                    context.commit(
                        mutationTypes.getSelectedPermissionsSuccess,
                        response.data
                    )
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    context.commit(mutationTypes.getSelectedPermissionsFailure, e.response.data)
                    toast.error(e.response.data.error)
                })
        })
    }
}

export default actions
