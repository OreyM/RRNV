const all = (credentials) => {
  return axios.get(
    '/catalog/products/all' + '?page=' + credentials.page + '&per_page=' + credentials.perPage
  )
}

const store = (credentials) => {
  return axios.post('/catalog/product/store', credentials)
}

const filter = (credentials) => {
  return axios.get(
    '/catalog/products/filter' +
      '?page=' +
      credentials.page +
      '&per_page=' +
      credentials.perPage +
      '&filter=' +
      credentials.filter
  )
}

const sort = (credentials) => {
  return axios.get(
    '/catalog/products/sort' +
      '?page=' +
      credentials.page +
      '&per_page=' +
      credentials.perPage +
      '&filter=' +
      credentials.filter +
      '&sort_by=' +
      credentials.sortBy +
      '&sort_desc=' +
      credentials.sortDesc
  )
}

const changeStatus = (credential) => {
  return axios.patch('/catalog/product/active-status/change', { id: credential })
}

const removeProduct = (credential) => {
  return axios.post('/catalog/product/remove', { id: credential })
}

const generateAlias = (credential) => {
  return axios.get('/catalog/product/service/alias?alias=' + credential)
}

const netPriceCalculate = (credentials) => {
  return axios.get(
    '/catalog/product/service/net-price?tax_rate_id=' +
      credentials.taxRate +
      '&gross_price=' +
      credentials.grossPrice
  )
}

export default {
  all,
  changeStatus,
  store,
  filter,
  generateAlias,
  netPriceCalculate,
  removeProduct,
  sort,
}
