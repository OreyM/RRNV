import { default as api } from '../../../api/products'
import { mutationTypes } from './mutations'
import toast from '../../../helpers/toast'
import { debug } from '../../../helpers/debug'

export const actionTypes = {
  store: '[product] store',
  aliasGenerate: '[product] aliasGenerate',
  netPriceCalculation: '[product] netPriceCalculation',
}

const actions = {
  [actionTypes.store](context, credentials) {
    return new Promise(() => {
      context.commit(mutationTypes.createProductStart)
      api
        .store(credentials)
        .then((response) => {
          debug(response.data)
          context.commit(mutationTypes.createProductSuccess)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.createProductFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.aliasGenerate](context, credential) {
    return new Promise(() => {
      context.commit(mutationTypes.getProductAliasStart)
      api
        .generateAlias(credential)
        .then((response) => {
          context.commit(mutationTypes.getProductAliasSuccess, response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getProductAliasFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.netPriceCalculation](context, credentials) {
    return new Promise(() => {
      context.commit(mutationTypes.getNetPriceStart)
      api
        .netPriceCalculate(credentials)
        .then((response) => {
          context.commit(mutationTypes.getNetPriceSuccess, response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getNetPriceFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },
}

export default actions
