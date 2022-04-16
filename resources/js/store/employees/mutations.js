export const mutationTypes = {
  getEmpoyeesListStart: '[employees] getEmpoyeesListStart',
  getEmpoyeesListSuccess: '[employees] getEmpoyeesListSuccess',
  getEmpoyeesListFailure: '[employees] getEmpoyeesListFailure',

  createEmployeeStart: '[employee] createEmployeeStart',
  createEmployeeSuccess: '[employee] createEmployeeSuccess',
  createEmployeeFailure: '[employee] createEmployeeFailure',

  changeEmployeeStatusStart: '[employee] changeEmployeeStatusStart',
  changeEmployeeStatusSuccess: '[employee] changeEmployeeStatusSuccess',
  changeEmployeeStatusFailure: '[employee] changeEmployeeStatusFailure',

  updateEmployeeDataStart: '[employee] updateEmployeeDataStart',
  updateEmployeeDataSuccess: '[employee] updateEmployeeDataSuccess',
  updateEmployeeDataFailure: '[employee] updateEmployeeDataFailure',

  deleteEmployeeStart: '[employee] deleteEmployeeStart',
  deleteEmployeeSuccess: '[employee] deleteEmployeeSuccess',
  deleteEmployeeFailure: '[employee] deleteEmployeeFailure',
}

const mutations = {
  // Init employees list
  [mutationTypes.getEmpoyeesListStart](state) {
    state.isLoading = true
    state.isTableDataLoading = true

    state.employeesList = []
    state.employeesCount = 0

    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.getEmpoyeesListSuccess](state, payload) {
    state.isLoading = false
    state.isTableDataLoading = false

    state.employeesList = payload.data
    state.employeesCount = payload.count
  },
  [mutationTypes.getEmpoyeesListFailure](state, payload) {
    state.isLoading = false
    state.isTableDataLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Create employee
  [mutationTypes.createEmployeeStart](state) {
    state.isLoading = true
    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.createEmployeeSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.createEmployeeFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Change status
  [mutationTypes.changeEmployeeStatusStart](state) {
    state.isLoading = true
    state.isEmployeeStatusChange = true
    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.changeEmployeeStatusSuccess](state) {
    state.isLoading = false
    state.isEmployeeStatusChange = false
  },
  [mutationTypes.changeEmployeeStatusFailure](state, payload) {
    state.isLoading = false
    state.isEmployeeStatusChange = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Update employee
  [mutationTypes.updateEmployeeDataStart](state) {
    state.isLoading = true
    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.updateEmployeeDataSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.updateEmployeeDataFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
  // Delete employee
  [mutationTypes.deleteEmployeeStart](state) {
    state.isLoading = true
    state.error = null
    state.errorDebug = null
  },
  [mutationTypes.deleteEmployeeSuccess](state) {
    state.isLoading = false
  },
  [mutationTypes.deleteEmployeeFailure](state, payload) {
    state.isLoading = false
    state.error = payload.error
    state.errorDebug = payload.error_debug
  },
}

export default mutations
