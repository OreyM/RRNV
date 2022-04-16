<template>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Prices</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <b-row align-h="between">
        <b-col md="4">
          <b-form-group label="Tax Rate" label-for="tax-rate">
            <b-form-select
              v-model="taxRate"
              :options="taxRates"
              value-field="id"
              text-field="name"
              :disabled="isTAxRatesLoading"
            >
              <template #first>
                <b-form-select-option :value="null" disabled
                  >-- Please select a tax rate --
                </b-form-select-option>
              </template>
            </b-form-select>
          </b-form-group>
        </b-col>

        <b-col md="7">
          <b-form-row>
            <b-form-group label="Gross Price" label-for="gross-price" class="col-md-5">
              <b-form-input
                id="gross-price"
                v-model="grossPrice"
                type="number"
                placeholder="Enter gross price..."
                required
              ></b-form-input>
            </b-form-group>
            <div class="d-flex justify-content-center align-items-center pt-3">
              <i class="fa-solid fa-link"></i>
            </div>
            <b-form-group label="Net Price" label-for="net-price" class="col-md-5">
              <b-form-input
                id="net-price"
                v-model="netPrice"
                type="number"
                placeholder="Net price generated automatically"
                disabled
              ></b-form-input>
            </b-form-group>
          </b-form-row>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import { actionTypes as productActions } from '../../../../store/catalog/product/actions'

export default {
  name: 'ProductPricesForm',

  computed: {
    ...mapState({
      isTAxRatesLoading: (state) => state.tax_rates.isLoading,
      taxRates: (state) => state.tax_rates.taxRatesSelection,
    }),
    taxRate: {
      get() {
        return this.$store.state.product.current.tax
      },
      set(taxRate) {
        this.$store.state.product.current.tax = taxRate
      },
    },
    grossPrice: {
      get() {
        return this.$store.state.product.current.grossPrice
      },
      set(grossPrice) {
        this.$store.state.product.current.grossPrice = grossPrice
      },
    },
    netPrice: {
      get() {
        return this.$store.state.product.current.netPrice
      },
      set(netPrice) {
        this.$store.state.product.current.netPrice = netPrice
      },
    },
  },

  watch: {
    taxRate: 'netPriceCalculation',
    grossPrice: 'netPriceCalculation',
  },

  methods: {
    netPriceCalculation: _.debounce(function () {
      if (!this.grossPrice) this.netPrice = null
      if (this.grossPrice && this.taxRate) {
        this.$store.dispatch(productActions.netPriceCalculation, {
          taxRate: this.taxRate,
          grossPrice: this.grossPrice,
        })
      }
    }, 1000),
  },
}
</script>

<style scoped></style>
