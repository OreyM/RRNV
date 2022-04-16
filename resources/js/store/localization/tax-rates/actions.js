import { default as api } from '../../../api/tax-rates'
import { mutationTypes } from './mutations'
import toast from '../../../helpers/toast'
import { debug } from '../../../helpers/debug'

export const actionTypes = {
  // init: '[stock-statuses] init',
  selection: '[tax-rates] selection',
  // createStockStatus: '[stock-status] createStockStatus',
  // updateStockStatus: '[stock-status] updateStockStatus',
  // deleteStockStatus: '[stock-status] deleteStockStatus'
}

const actions = {
  // [actionTypes.init](context) {
  //     return new Promise(() => {
  //         context.commit(mutationTypes.getStockStatusesListStart)
  //         api.all()
  //             .then((response) => {
  //                 context.commit(
  //                     mutationTypes.getStockStatusesListSuccess,
  //                     response.data.statuses
  //                 )
  //             })
  //             .catch((e) => {
  //                 debug(e.response.data.error)
  //                 debug(e.response.data.error_debug)
  //                 context.commit(mutationTypes.getStockStatusesListFailure, e.response.data)
  //                 toast.error(e.response.data.error)
  //             })
  //     })
  // },

  [actionTypes.selection](context) {
    return new Promise(() => {
      context.commit(mutationTypes.getTaxRatesSelectionStart)
      api
        .selection()
        .then((response) => {
          context.commit(mutationTypes.getTaxRatesSelectionSuccess, response.data.taxes)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getTaxRatesSelectionFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  // [actionTypes.createStockStatus](context, credential) {
  //     return new Promise((resolve) => {
  //         context.commit(mutationTypes.createStockStatusStart)
  //
  //         api.createStockStatus(credential)
  //             .then((response) => {
  //                 context.commit(mutationTypes.createStockStatusSuccess)
  //                 toast.success(response.data.success)
  //                 resolve(response.data)
  //             })
  //             .catch((e) => {
  //                 debug(e.response.data.error)
  //                 debug(e.response.data.error_debug)
  //                 context.commit(mutationTypes.createStockStatusFailure, e.response.data)
  //                 toast.error(e.response.data.error)
  //             })
  //     })
  // },
  //
  // [actionTypes.updateStockStatus](context, credentials) {
  //     return new Promise(() => {
  //         context.commit(mutationTypes.updateStockStatusStart)
  //
  //         api.updateStockStatus(credentials)
  //             .then((response) => {
  //                 context.commit(mutationTypes.updateStockStatusSuccess)
  //                 toast.success(response.data.success)
  //             })
  //             .catch((e) => {
  //                 debug(e.response.data.error)
  //                 debug(e.response.data.error_debug)
  //                 context.commit(mutationTypes.updateStockStatusFailure, e.response.data)
  //                 toast.error(e.response.data.error)
  //             })
  //     })
  // },
  //
  // [actionTypes.deleteStockStatus](context, credential) {
  //     return new Promise((resolve) => {
  //         context.commit(mutationTypes.deleteStockStatusStart)
  //
  //         api.deleteStockStatus(credential)
  //             .then((response) => {
  //                 context.commit(mutationTypes.deleteStockStatusSuccess)
  //                 toast.success(response.data.success)
  //                 resolve(response.data)
  //             })
  //             .catch((e) => {
  //                 debug(e.response.data.error)
  //                 debug(e.response.data.error_debug)
  //                 context.commit(mutationTypes.deleteStockStatusFailure, e.response.data)
  //                 toast.error(e.response.data.error)
  //             })
  //     })
  // }
}

export default actions
