const all = () => axios.get('/catalog/manufacturers/all')

const createManufacturer = (credentials) => {
  const { name, image } = credentials

  return axios.post('/catalog/manufacturer/create', { name, image })
}

const updateManufacturer = (credentials) => {
  const { id, manufacturerName: name, image } = credentials

  return axios.put('/catalog/manufacturer/update', { id, name, image })
}

const deleteManufacturer = (credential) => {
  return axios.post('/catalog/manufacturer/delete', { id: credential })
}

export default {
  all,
  createManufacturer,
  deleteManufacturer,
  updateManufacturer,
}
