<template>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">General</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <b-form-group label="Product Name" label-for="product-name">
        <b-form-input
          id="product-name"
          v-model="name"
          placeholder="Enter product name..."
          required
        ></b-form-input>
      </b-form-group>
      <b-form-group label="Product Alias" label-for="product-alias">
        <b-form-input
          id="product-alias"
          v-model="alias.value"
          placeholder="Alias is automatically generated..."
          :class="alias.isError ? 'is-invalid' : ''"
          :disabled="alias.value.length === 0"
          required
        ></b-form-input>
        <b-form-invalid-feedback :state="alias.isError">
          {{ alias.error }}
        </b-form-invalid-feedback>
      </b-form-group>

      <b-form-row>
        <b-form-group
          label="Product Manufacturer"
          label-for="product-manufacturer"
          class="col-md-8"
        >
          <b-form-select
            id="product-manufacturer"
            v-model="manufacturer"
            :options="manufacturers"
            value-field="id"
            text-field="manufacturerName"
            :disabled="isManufacturersLoading"
            required
          >
            <template #first>
              <b-form-select-option :value="null" disabled
                >-- Please select a product manufacturer --
              </b-form-select-option>
            </template>
          </b-form-select>
        </b-form-group>
        <b-form-group label="Product Article" label-for="product-article" class="col-md-4">
          <b-form-input
            id="product-article"
            v-model="article"
            placeholder="Enter product article..."
            required
          ></b-form-input>
        </b-form-group>
      </b-form-row>

      <b-form-group label="Product Description" label-for="product-description">
        <b-form-textarea
          id="product-description"
          v-model="description"
          placeholder="Enter something..."
          rows="6"
          max-rows="6"
        ></b-form-textarea>
      </b-form-group>

      <b-form-group label="Product Status" label-for="product-status">
        <b-form-checkbox id="product-status" v-model="status" name="check-button" switch>
          <b>{{ status ? 'Active' : 'Inactive' }}</b>
        </b-form-checkbox>
      </b-form-group>
    </div>
  </div>
</template>

<script>
import { actionTypes as productActions } from '../../../../store/catalog/product/actions'
import { mapState } from 'vuex'

export default {
  /**
   * https://bootstrap-vue.org/docs/components/form-input#contextual-states input error state
   */

  name: 'ProductGeneralForm',

  computed: {
    ...mapState({
      isManufacturersLoading: (state) => state.manufacturers.isLoading,
      manufacturers: (state) => state.manufacturers.manufacturersList,
    }),

    name: {
      get() {
        return this.$store.state.product.current.name
      },
      set(name) {
        this.$store.state.product.current.name = name
      },
    },
    alias: {
      get() {
        return this.$store.state.product.current.alias
      },
      set(alias) {
        this.$store.state.product.current.alias.value = alias
      },
    },
    manufacturer: {
      get() {
        return this.$store.state.product.current.manufacturer
      },
      set(id) {
        this.$store.state.product.current.manufacturer = id
      },
    },
    article: {
      get() {
        return this.$store.state.product.current.article
      },
      set(article) {
        this.$store.state.product.current.article = article
      },
    },
    description: {
      get() {
        return this.$store.state.product.current.description
      },
      set(description) {
        this.$store.state.product.current.description = description
      },
    },
    status: {
      get() {
        return this.$store.state.product.current.status
      },
      set(status) {
        this.$store.state.product.current.status = status
      },
    },
  },

  watch: {
    name(name) {
      this.name.length ? this.generateAlias(name) : (this.alias.value = '')
    },
    // TODO multiple fetch when change alias
    'alias.value'(alias) {
      this.alias.value.length
        ? this.generateAlias(alias)
        : (this.$store.state.product.current.alias.value = '')
    },
  },

  methods: {
    generateAlias: _.debounce(function (name) {
      this.$store.dispatch(productActions.aliasGenerate, name)
    }, 1000),
  },
}
</script>

<style scoped></style>
