<template>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Availability</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <b-row align-h="between">
        <b-col md="6">
          <b-form-group label="Product Quantity" label-for="product-quantity" class="col-md-6">
            <b-form-input
              id="product-quantity"
              v-model="quantity"
              type="number"
              placeholder="Quantity of product in stock..."
              required
            ></b-form-input>
          </b-form-group>
        </b-col>
        <b-col md="6">
          <b-form-row>
            <b-form-group label="Minimum Order" label-for="minimum-order" class="col-md-6">
              <b-form-input
                id="minimum-order"
                v-model="minimum"
                type="number"
                placeholder="Minimum order quantity..."
                required
              ></b-form-input>
            </b-form-group>
            <b-form-group label="Maximum Order" label-for="maximum-order" class="col-md-6">
              <b-form-input
                id="maximum-order"
                v-model="maximum"
                type="number"
                placeholder="Maximum order quantity..."
                required
              ></b-form-input>
            </b-form-group>
          </b-form-row>
        </b-col>
      </b-row>
      <b-row align-h="between">
        <b-col md="12">
          <b-form-group label="Out Of Stock Status" label-for="stock-status" class="col-md-3">
            <b-form-select
              id="stock-status"
              v-model="stockStatus"
              :options="stockStatuses"
              value-field="id"
              text-field="statusName"
              :disabled="isStockStatusesLoading"
              required
            >
              <template #first>
                <b-form-select-option :value="null" disabled
                  >-- Please select a stock status --
                </b-form-select-option>
              </template>
            </b-form-select>
          </b-form-group>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  name: 'ProductAvailabilityForm',

  data() {
    return {}
  },

  computed: {
    ...mapState({
      isStockStatusesLoading: (state) => state.stock_statuses.isLoading,
      stockStatuses: (state) => state.stock_statuses.stockStatusesList,
    }),

    quantity: {
      get() {
        return this.$store.state.product.current.quantity
      },
      set(quantity) {
        this.$store.state.product.current.quantity = quantity
      },
    },
    minimum: {
      get() {
        return this.$store.state.product.current.minimum
      },
      set(minimum) {
        this.$store.state.product.current.minimum = minimum
      },
    },
    maximum: {
      get() {
        return this.$store.state.product.current.maximum
      },
      set(maximum) {
        this.$store.state.product.current.maximum = maximum
      },
    },
    stockStatus: {
      get() {
        return this.$store.state.product.current.stockStatus
      },
      set(id) {
        this.$store.state.product.current.stockStatus = id
      },
    },
  },
}
</script>

<style scoped></style>
