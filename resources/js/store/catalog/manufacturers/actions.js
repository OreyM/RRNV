import { default as api } from '../../../api/manufacturers'
import { mutationTypes } from './mutations'
import toast from '../../../helpers/toast'
import { debug } from '../../../helpers/debug'

export const actionTypes = {
  init: '[manufacturers] init',
  createManufacturer: '[manufacturer] createManufacturer',
  updateManufacturer: '[manufacturer] updateManufacturer',
  deleteManufacturer: '[manufacturer] deleteManufacturer',
}

const actions = {
  [actionTypes.init](context) {
    return new Promise(() => {
      context.commit(mutationTypes.getManufacturersStart)
      api
        .all()
        .then((response) => {
          context.commit(mutationTypes.getManufacturersSuccess, response.data.manufacturers)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getManufacturersFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.createManufacturer](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.createManufacturerStart)

      api
        .createManufacturer(credential)
        .then((response) => {
          context.commit(mutationTypes.createManufacturerSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.createManufacturerFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.updateManufacturer](context, credentials) {
    return new Promise(() => {
      context.commit(mutationTypes.updateManufacturerStart)

      api
        .updateManufacturer(credentials)
        .then((response) => {
          context.commit(mutationTypes.updateManufacturerSuccess)
          toast.success(response.data.success)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.updateManufacturerFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.deleteManufacturer](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.deleteManufacturerStart)

      api
        .deleteManufacturer(credential)
        .then((response) => {
          context.commit(mutationTypes.deleteManufacturerSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.deleteManufacturerFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },
}

export default actions
