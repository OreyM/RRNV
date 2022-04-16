import { default as api } from '../../../api/products'
import { mutationTypes } from './mutations'
import toast from '../../../helpers/toast'
import { debug } from '../../../helpers/debug'

export const actionTypes = {
  init: '[products] init',
  filter: '[products] fiter',
  sort: '[products] sort',
  changeStatus: '[product] changeStatus',
  removeProduct: '[product] removeProduct',
}

const actions = {
  [actionTypes.init](context, credentials) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.getProductsListStart)
      api
        .all(credentials)
        .then((response) => {
          context.commit(mutationTypes.getProductsListSuccess, response.data)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getProductsListFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.filter](context, credentials) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.getProductsListStart)
      api
        .filter(credentials)
        .then((response) => {
          context.commit(mutationTypes.getProductsListSuccess, response.data)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getProductsListFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.sort](context, credentials) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.getProductsListStart)
      api
        .sort(credentials)
        .then((response) => {
          context.commit(mutationTypes.getProductsListSuccess, response.data)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getProductsListFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.changeStatus](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.changeProductStatusStart)

      api
        .changeStatus(credential)
        .then((response) => {
          context.commit(mutationTypes.changeProductStatusSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          toast.error(e.response.data.error)
          context.commit(mutationTypes.changeProductStatusFailure, e.response.data)
        })
    })
  },

  [actionTypes.removeProduct](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.deleteProductStart)
      api
        .removeProduct(credential)
        .then((response) => {
          context.commit(mutationTypes.deleteProductSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.deleteProductFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },
}

export default actions
