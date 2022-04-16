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
            <b-form-checkbox value="displayRole">Role</b-form-checkbox>
            <b-form-checkbox value="name">Role alias</b-form-checkbox>
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

      <template #cell(name)="row"> {{ row.value.first }} {{ row.value.last }} </template>

      <template #cell(isActive)="data">
        <span v-html="data.value"></span>
      </template>

      <template #cell(actions)="row" class="action-buttons-group">
        <b-button
          size="sm"
          variant="danger"
          v-b-modal.delete-role-modal
          @click="selectedRole = row.item"
        >
          <i class="fa-solid fa-trash"></i>
        </b-button>
        <b-button
          size="sm"
          variant="primary"
          v-b-modal.edit-role-modal
          @click="selectedRole = row.item"
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

    <EditRoleModal :selectedRole="selectedRole" />

    <DeleteRoleModal :selectedRole="selectedRole" />
  </b-container>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes as rolesAction } from '../../store/roles/actions'

import EditRoleModal from './modals/EditRoleModal'
import DeleteRoleModal from './modals/DeleteRoleModal'

export default {
  name: 'RolesTable',

  components: { EditRoleModal, DeleteRoleModal },

  data() {
    return {
      fields: [
        { key: 'displayName', label: 'Role', sortable: true, sortDirection: 'desc' },
        { key: 'alias', label: 'Role alias', sortable: true },
        { key: 'description', label: 'Role description', sortable: false },
        { key: 'actions', label: '' },
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
      selectedRole: {},
    }
  },

  computed: {
    ...mapState({
      isLoading: (state) => state.roles.isLoading,
      isBusy: (state) => state.roles.isTableDataLoading,
      count: (state) => state.roles.rolesCount,
      items: (state) => state.roles.rolesList,
    }),
    totalRows: {
      get() {
        return this.$store.state.roles.rolesCount
      },
      set(length) {
        this.$store.state.roles.rolesCount = length
      },
    },
  },

  mounted() {
    this.$store.dispatch(rolesAction.init)
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
