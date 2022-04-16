<template>
  <div id="product-settings-cards">
    <div class="card">
      <div class="card-header">
        <b-button size="sm" variant="primary" @click="onCreate"> Save </b-button>
      </div>
    </div>

    <ProductGeneralForm />
    <ProductCategoryAndTagsForm />
    <ProductPricesForm />
    <ProductAvailabilityForm />
    <ProductImagesForm />
    <ProductDeliveryForm />
  </div>
</template>

<script>
import { actionTypes as productAction } from '../../../store/catalog/product/actions'
import { actionTypes as manufacturerAction } from '../../../store/catalog/manufacturers/actions'
import { actionTypes as taxRatesAction } from '../../../store/localization/tax-rates/actions'
import { actionTypes as stockStatusesAction } from '../../../store/localization/stock-statuses/actions'

import ProductGeneralForm from './forms/ProductGeneralForm'
import ProductPricesForm from './forms/ProductPricesForm'
import ProductAvailabilityForm from './forms/ProductAvailabilityForm'
import ProductDeliveryForm from './forms/ProductDeliveryForm'
import ProductCategoryAndTagsForm from './forms/ProductCategoryAndTagsForm'
import ProductImagesForm from './forms/ProductImagesForm'

export default {
  name: 'ProductCreate',

  data() {
    return {
      demoData: {
        name: 'Demo Product',
        alias: {
          value: 'demo-product',
          isError: false,
          error: null,
        },
        manufacturer: 1,
        article: 'DP-899212',
        description: 'Product description',
        status: true,
        tax: 1,
        grossPrice: 1000,
        netPrice: null,
        quantity: 99,
        minimum: 1,
        maximum: 10,
        stockStatus: 3,
      },
    }
  },

  components: {
    ProductGeneralForm,
    ProductPricesForm,
    ProductAvailabilityForm,
    ProductDeliveryForm,
    ProductCategoryAndTagsForm,
    ProductImagesForm,
  },

  mounted() {
    this.$store.dispatch(manufacturerAction.init)
    this.$store.dispatch(taxRatesAction.selection)
    this.$store.dispatch(stockStatusesAction.init)

    // this.$store.state.product.current = this.demoData // TODO test data -> DEL!
  },

  methods: {
    onCreate() {
      const {
        alias: { value: alias },
        grossPrice: price,
        manufacturer: manufacturer_id,
        status: is_active,
        tax: tax_rate_id,
        stockStatus: stock_status_id,
        ...product
      } = this.$store.state.product.current

      this.$store.dispatch(productAction.store, {
        alias,
        price,
        manufacturer_id,
        is_active,
        tax_rate_id,
        stock_status_id,
        ...product,
      })
    },
  },
}
</script>

<style scoped></style>
