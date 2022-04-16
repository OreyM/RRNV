import Vue from 'vue'
import Vuex from 'vuex'

import employees from './employees'
import manufacturers from './catalog/manufacturers'
import permissions from './permissions'
import product from './catalog/product'
import products from './catalog/products'
import roles from './roles'
import stock_statuses from './localization/stock-statuses'
import tax_rates from './localization/tax-rates'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {},
  mutations: {},
  getters: {},
  actions: {},
  modules: {
    employees,
    manufacturers,
    permissions,
    product,
    products,
    roles,
    stock_statuses,
    tax_rates,
  },
})
