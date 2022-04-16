import { default as api } from '../../api/API_FILE'
import { mutationTypes } from './mutations'
import toast from '../../helpers/toast'
import { debug } from '../../helpers/debug'

export const actionTypes = {
    actionName: '[alias] actionName',
}

const actions = {
    [actionTypes.actionName](context) {
        return new Promise(() => {
            context.commit(mutationTypes.mutationStart)
            api.URI()
                .then((response) => {
                    context.commit(
                        mutationTypes.mutationSuccess,
                        response.data.RESPONSE_DATA
                    )
                })
                .catch((e) => {
                    debug(e.response.data.error)
                    debug(e.response.data.error_debug)
                    context.commit(mutationTypes.mutationFailure, e.response.data)
                    toast.error(e.response.data.error)
                })
        })
    },
}

export default actions
