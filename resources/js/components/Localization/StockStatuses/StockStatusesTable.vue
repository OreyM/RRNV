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
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Type to Search"
            ></b-form-input>
          </b-input-group>
        </b-form-group>
      </b-col>
    </b-row>

    <b-table
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      :busy="isBusy"
      stacked="md"
      show-empty
      small
      selectable
      :select-mode="'single'"
      @row-selected="onRowSelected"
      @filtered="onFiltered"
    >
      <template #table-busy>
        <div class="text-center text-danger my-2">
          <b-spinner class="align-middle"></b-spinner>
          <strong>Loading...</strong>
        </div>
      </template>

      <template #cell(name)="row"> {{ row.value.first }} {{ row.value.last }} </template>

      <template #cell(actions)="row" class="action-buttons-group">
        <b-button
          size="sm"
          variant="danger"
          v-b-modal.delete-stock-status-modal
          @click="selectedStockStatus = row.item"
        >
          <i class="fa-solid fa-trash"></i>
        </b-button>
        <b-button
          size="sm"
          variant="primary"
          v-b-modal.edit-stock-status-modal
          @click="selectedStockStatus = row.item"
        >
          <i class="fa-solid fa-pen-to-square"></i>
        </b-button>
      </template>
    </b-table>

    <b-row v-if="!isLoading && totalRows > perPage">
      <b-col md="12" class="my-1">
        <b-pagination
          v-model="currentPage"
          :total-rows="totalRows"
          :per-page="perPage"
          align="center"
          size="sm"
          class="my-0"
        ></b-pagination>
      </b-col>
    </b-row>

    <EditStockStatusModal :selectedStockStatus="selectedStockStatus" />

    <DeleteStockStatusModal :selectedStockStatus="selectedStockStatus" />
  </b-container>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes as stockStatusesAction } from '../../../store/localization/stock-statuses/actions'

import EditStockStatusModal from './modals/EditStockStatusModal'
import DeleteStockStatusModal from './modals/DeleteStockStatusModal'

export default {
  name: 'StockStatusesTable',

  components: { EditStockStatusModal, DeleteStockStatusModal },

  data() {
    return {
      fields: [
        {
          key: 'statusName',
          label: 'Stock Status name',
          sortable: true,
          sortDirection: 'desc',
        },
        { key: 'actions', label: '', class: 'text-right' },
      ],
      currentPage: 1,
      perPage: 25,
      pageOptions: [25, 50, 75, { value: 100, text: 'Show a lot' }],
      sortBy: '',
      sortDesc: false,
      sortDirection: 'asc',
      filter: null,
      filterOn: [],
      selected: [],
      selectedStockStatus: {},
    }
  },

  computed: {
    ...mapState({
      isLoading: (state) => state.stock_statuses.isLoading,
      isBusy: (state) => state.stock_statuses.isTableDataLoading,
      count: (state) => state.stock_statuses.stockStatusesCount,
      items: (state) => state.stock_statuses.stockStatusesList,
    }),
    totalRows: {
      get() {
        return this.$store.state.stock_statuses.stockStatusesCount
      },
      set(length) {
        this.$store.state.stock_statuses.stockStatusesCount = length
      },
    },
  },

  mounted() {
    this.$store.dispatch(stockStatusesAction.init)
  },

  methods: {
    onRowSelected(items) {
      this.selected = items
    },
    onFiltered(filteredItems) {
      this.totalRows = filteredItems.length
      this.currentPage = 1
    },
  },
}
</script>

<style scoped></style>
