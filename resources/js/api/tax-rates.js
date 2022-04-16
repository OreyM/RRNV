// const all = () => axios.get('/localization/stock-statuses/all')

const selection = () => axios.get('/localization/tax-rates/selection')

// const createStockStatus = (credential) => {
//
//     return axios.post('/localization/stock-status/create', credential)
// }
//
// const updateStockStatus = (credentials) => {
//     const { id, statusName: name } = credentials
//
//     return axios.put('/localization/stock-status/update', { id, name })
// }
//
// const deleteStockStatus = (credential) => {
//
//     return axios.post('/localization/stock-status/delete', { id: credential })
// }

export default {
  selection,
}
