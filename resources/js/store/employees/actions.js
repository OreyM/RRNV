import { default as api } from '../../api/employees'
import { mutationTypes } from './mutations'
import toast from '../../helpers/toast'
import { debug } from '../../helpers/debug'

export const actionTypes = {
  init: '[employees] init',
  createEmployee: '[employee] createEmployee',
  changeStatus: '[employee] changeStatus',
  updateEmployee: '[employee] updateEmployee',
  deleteEmployee: '[employee] deleteEmployee',
}

const actions = {
  [actionTypes.init](context) {
    return new Promise(() => {
      context.commit(mutationTypes.getEmpoyeesListStart)
      api
        .init()
        .then((response) => {
          context.commit(mutationTypes.getEmpoyeesListSuccess, response.data.employees)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          context.commit(mutationTypes.getEmpoyeesListFailure, e.response.data)
          toast.error(e.response.data.error)
        })
    })
  },

  [actionTypes.createEmployee](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.createEmployeeStart)

      api
        .createEmployee(credential)
        .then((response) => {
          context.commit(mutationTypes.createEmployeeSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          toast.error(e.response.data.error)
          context.commit(mutationTypes.createEmployeeFailure, e.response.data)
        })
    })
  },

  [actionTypes.changeStatus](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.changeEmployeeStatusStart)

      api
        .changeStatus(credential)
        .then((response) => {
          context.commit(mutationTypes.changeEmployeeStatusSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          toast.error(e.response.data.error)
          context.commit(mutationTypes.changeEmployeeStatusFailure, e.response.data)
        })
    })
  },

  [actionTypes.updateEmployee](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.updateEmployeeDataStart)

      api
        .updateEmployee(credential)
        .then((response) => {
          context.commit(mutationTypes.updateEmployeeDataSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          toast.error(e.response.data.error)
          context.commit(mutationTypes.updateEmployeeDataFailure, e.response.data)
        })
    })
  },

  [actionTypes.deleteEmployee](context, credential) {
    return new Promise((resolve) => {
      context.commit(mutationTypes.deleteEmployeeStart)

      api
        .deleteEmployee(credential)
        .then((response) => {
          context.commit(mutationTypes.deleteEmployeeSuccess)
          toast.success(response.data.success)
          resolve(response.data)
        })
        .catch((e) => {
          debug(e.response.data.error)
          debug(e.response.data.error_debug)
          toast.error(e.response.data.error)
          context.commit(mutationTypes.deleteEmployeeFailure, e.response.data)
        })
    })
  },
}

export default actions
