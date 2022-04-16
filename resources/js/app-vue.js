import Vue from 'vue'
import store from './store'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import EmployeesTable from './components/Employees/EmployeesTable'
import EmployeeCreate from './components/Employees/EmployeeCreate'

import RolesTable from './components/Roles/RolesTable'
import RoleCreate from './components/Roles/RoleCreate'

import StockStatusesTable from './components/Localization/StockStatuses/StockStatusesTable'
import StockStatusCreate from './components/Localization/StockStatuses/StockStatusCreate'

import ProductsTable from './components/Catalog/Products/ProductsTable'
import ProductCreate from './components/Catalog/Products/ProductCreate'
import ManufacturersTable from './components/Catalog/Manufacturers/ManufacturersTable'
import ManufacturerCreate from './components/Catalog/Manufacturers/ManufacturerCreate'

// disable the vue dev warning
Vue.config.productionTip = false

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

new Vue({
  el: '#app',
  store,
  components: {
    'employees-table-component': EmployeesTable,
    'employee-create-component': EmployeeCreate,

    'roles-table-component': RolesTable,
    'role-create-component': RoleCreate,

    'stock-statuses-table-component': StockStatusesTable,
    'stock-status-create-component': StockStatusCreate,

    'products-table-component': ProductsTable,
    'product-create-component': ProductCreate,
    'manufacturers-table-component': ManufacturersTable,
    'manufacturer-create-component': ManufacturerCreate,
  },
})
