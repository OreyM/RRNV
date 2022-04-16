<template>
  <b-container fluid>
    <b-row class="mb-3">
      <b-col lg="6" class="my-1">
        <b-form-group
          label="Filter"
          label-for="filter-input"
          label-cols-sm="1"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              v-model="filter"
              type="search"
              placeholder="Type to Search"
            ></b-form-input>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col lg="4" class="my-1"></b-col>

      <b-col sm="2" md="2" class="my-1">
        <b-form-group
          label="Per page"
          label-for="per-page-select"
          label-cols-sm="5"
          label-cols-md="5"
          label-cols-lg="5"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-form-select
            id="per-page-select"
            v-model="perPage"
            :options="pageOptions"
            size="sm"
          ></b-form-select>
        </b-form-group>
      </b-col>
    </b-row>

    <b-table
      :items="items"
      :fields="fields"
      :per-page="perPage"
      :no-local-sorting="true"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :busy="isBusy"
      stacked="md"
      show-empty
      small
      selectable
      :select-mode="'single'"
      @row-selected="onRowSelected"
    >
      <template #table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle"></b-spinner>
          <strong>Loading...</strong>
        </div>
      </template>

      <template #cell(image)="row">
        <b-img-lazy :src="row.value" thumbnail fluid center class="product-image-thumb" alt="" />
      </template>

      <template #cell(is_active)="row">
        <span v-html="row.value"></span>
      </template>

      <template #cell(actions)="row" class="action-buttons-group">
        <b-button
          size="sm"
          variant="danger"
          v-b-modal.delete-product-modal
          @click="selectedProduct = row.item"
        >
          <i class="fa-solid fa-trash"></i>
        </b-button>
        <b-button
          size="sm"
          variant="warning"
          v-b-modal.change-status-product-modal
          @click="selectedProduct = row.item"
        >
          <i v-if="row.item.is_active" class="fa-solid fa-ban"></i>
          <i v-else class="fa-solid fa-circle-check"></i>
        </b-button>
        <b-button
          size="sm"
          variant="primary"
          v-b-modal.edit-employee-modal
          @click="selectedProduct = row.item"
        >
          <i class="fa-solid fa-pen-to-square"></i>
        </b-button>
      </template>
    </b-table>

    <b-row>
      <b-col md="12" class="my-1">
        <pagination
          :data="paginated"
          @pagination-change-page="selectedPage"
          class="my-0 pagination-sm justify-content-center"
        ></pagination>
      </b-col>
    </b-row>

    <DeleteProductModal :selectedProduct="selectedProduct" />

    <ChangeStatusProductModal :selectedProduct="selectedProduct" />
  </b-container>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes as productsAction } from '../../../store/catalog/products/actions'

import Pagination from 'laravel-vue-pagination'
import ChangeStatusProductModal from './modals/ChangeStatusProductModal'
import DeleteProductModal from './modals/DeleteProductModal'

export default {
  name: 'ProductsTable',

  components: { ChangeStatusProductModal, DeleteProductModal, Pagination },

  data() {
    return {
      fields: [
        { key: 'image', label: 'Image', sortable: false },
        { key: 'name', label: 'Product', sortable: true, sortDirection: 'desc' },
        { key: 'article', label: 'Article', sortable: true, sortDirection: 'desc' },
        { key: 'price', label: 'Price', sortable: true, sortDirection: 'desc' },
        { key: 'quantity', label: 'Quantity', sortable: true, sortDirection: 'desc' },
        { key: 'stock_status', label: 'Stock Status', sortable: true, sortDirection: 'desc' },
        {
          key: 'is_active',
          label: 'Active',
          formatter: (value, key, item) => {
            return value
              ? '<i class="fa-solid fa-circle-check text-success"></i>'
              : '<i class="fa-solid fa-circle-xmark text-danger"></i>'
          },
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true,
        },
        { key: 'actions', label: '', class: 'text-right' },
      ],
      perPage: 15,
      pageOptions: [15, 30, 45, 60, { value: 100, text: 'Show a lot' }],
      sortBy: 'name',
      sortDesc: false,
      sortDirection: 'asc',
      filter: '',
      selected: [],
      selectedProduct: {},
    }
  },

  computed: {
    ...mapState({
      isLoading: (state) => state.products.isLoading,
      isBusy: (state) => state.products.isTableDataLoading,

      paginated: (state) => state.products.paginated,
      currentPage: (state) => state.products.currentPage,

      count: (state) => state.products.productsCount,
      items: (state) => state.products.productsList,
    }),
  },

  watch: {
    perPage: 'allProducts',
    filter: 'startFiter',
    sortBy: 'onSort',
    sortDesc: 'onSort',
  },

  mounted() {
    this.allProducts(this.currentPage)
  },

  methods: {
    allProducts(page = 1) {
      return this.$store.dispatch(productsAction.init, {
        page: page,
        perPage: this.perPage,
      })
    },
    onFiltered(page = 1) {
      this.$store.dispatch(productsAction.filter, {
        page: page,
        perPage: this.perPage,
        filter: this.filter,
      })
    },
    startFiter: _.debounce(function (page = 1) {
      this.filter.length ? this.onFiltered(page) : this.allProducts()
    }, 500),
    onSort(page = 1) {
      if (!this.sortBy) return null
      this.$store.dispatch(productsAction.sort, {
        page: page,
        perPage: this.perPage,
        filter: this.filter,
        sortBy: this.sortBy,
        sortDesc: +this.sortDesc,
      })
    },
    selectedPage(page = 1) {
      if (this.sortBy.length) return this.onSort(page)
      if (this.filter.length) return this.onFiltered(page)
      return this.allProducts(page)
    },
    onRowSelected(items) {
      this.selected = items
    },
  },
}
</script>

<style scoped>
.product-image-thumb {
  width: 60px;
  height: 60px;
}
</style>
