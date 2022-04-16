const init = () => axios.get('/employees/all')

const createEmployee = (credentials) => {
  const {
    name,
    email,
    password,
    passwordConfirm: password_confirmation,
    status: is_active,
    role,
  } = credentials

  return axios.post('/employee/create', {
    name,
    email,
    password,
    password_confirmation,
    is_active,
    role,
  })
}

const changeStatus = (credentials) => {
  return axios.put('/employee/active-status/change', { id: credentials })
}

const updateEmployee = (credentials) => {
  const { id, name, role } = credentials
  return axios.put('/employee/update', { id, name, role })
}

const deleteEmployee = (credentials) => {
  return axios.post('/employee/delete', { id: credentials })
}

export default {
  changeStatus,
  createEmployee,
  deleteEmployee,
  init,
  updateEmployee,
}
