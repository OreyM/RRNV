<template>
  <b-container fluid>
    <b-row>
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

      <b-col lg="4" class="my-1">
        <b-form-group
          v-model="sortDirection"
          label="Filter On"
          description="Leave all unchecked to filter on all data"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
          v-slot="{ ariaDescribedby }"
        >
          <b-form-checkbox-group
            v-model="filterOn"
            :aria-describedby="ariaDescribedby"
            class="mt-1"
          >
            <b-form-checkbox value="name">Employee</b-form-checkbox>
            <b-form-checkbox value="email">Email</b-form-checkbox>
            <b-form-checkbox value="role">Role</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>
      </b-col>

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

      <template #cell(isActive)="data">
        <span v-html="data.value"></span>
      </template>

      <template #cell(actions)="row" class="action-buttons-group">
        <b-button
          size="sm"
          variant="danger"
          v-b-modal.delete-employee-modal
          @click="selectedEmployee = row.item"
        >
          <i class="fa-solid fa-trash"></i>
        </b-button>
        <b-button
          size="sm"
          variant="warning"
          v-b-modal.change-status-employee-modal
          @click="selectedEmployee = row.item"
        >
          <i v-if="row.item.isActive" class="fa-solid fa-ban"></i>
          <i v-else class="fa-solid fa-circle-check"></i>
        </b-button>
        <b-button
          size="sm"
          variant="primary"
          v-b-modal.edit-employee-modal
          @click="selectedEmployee = row.item"
        >
          <i class="fa-solid fa-user-pen"></i>
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

    <EditEmployeeModal :selectedEmployee="selectedEmployee" />

    <ChangeStatusEmployeeModal :selectedEmployee="selectedEmployee" />

    <DeleteEmployeeModal :selectedEmployee="selectedEmployee" />
  </b-container>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes as employeesAction } from '../../store/employees/actions'

import EditEmployeeModal from './modals/EditEmployeeModal'
import ChangeStatusEmployeeModal from './modals/ChangeStatusEmployeeModal'
import DeleteEmployeeModal from './modals/DeleteEmployeeModal'

export default {
  name: 'EmployeesTable',

  components: { EditEmployeeModal, ChangeStatusEmployeeModal, DeleteEmployeeModal },

  data() {
    return {
      fields: [
        { key: 'employee', label: 'Employee', sortable: true, sortDirection: 'desc' },
        { key: 'email', label: 'Email', sortable: true },
        {
          key: 'isActive',
          label: 'Active',
          formatter: (value, key, item) => {
            return value
              ? '<i class="fa-solid fa-user-check text-success"></i>'
              : '<i class="fa-solid fa-user-slash text-danger"></i>'
          },
          sortable: true,
          sortByFormatted: true,
          filterByFormatted: true,
        },
        { key: 'displayRole', label: 'Role', sortable: true, sortDirection: 'desc' },
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
      selectedEmployee: {},
    }
  },

  computed: {
    ...mapState({
      isLoading: (state) => state.employees.isLoading,
      isBusy: (state) => state.employees.isTableDataLoading,
      count: (state) => state.employees.employeesCount,
      items: (state) => state.employees.employeesList,
    }),

    totalRows: {
      get() {
        return this.$store.state.employees.employeesCount
      },
      set(length) {
        this.$store.state.employees.employeesCount = length
      },
    },

    // sortOptions() {
    //     return this.fields.filter(f => f.sortable).map(f => {
    //             return { text: f.label, value: f.key }
    //         })
    // }
  },

  mounted() {
    this.$store.dispatch(employeesAction.init)
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
