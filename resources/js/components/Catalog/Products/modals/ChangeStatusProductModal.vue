<template>
  <b-modal
    id="change-status-product-modal"
    size="md"
    centered
    :title="selectedProduct.is_active ? 'Deactivate product' : 'Activate product'"
  >
    You are going to
    {{ selectedProduct.is_active ? 'deactivate' : 'activate' }}
    product: <strong>{{ selectedProduct.name }}</strong
    >. Are you sure?

    <template #modal-footer="{ ok, cancel, hide }">
      <b-button size="sm" variant="danger" @click="cancel()" :disabled="isLoading">
        Go back
      </b-button>
      <b-button size="sm" variant="success" @click="setActive" :disabled="isLoading">
        <span v-if="isLoading">
          <b-spinner small type="grow"></b-spinner>
          Execute...
        </span>
        <span v-else>I'm sure</span>
      </b-button>
    </template>
  </b-modal>
</template>

<script>
import { actionTypes as productAction } from '../../../../store/catalog/products/actions'
import { mapState } from 'vuex'

export default {
  name: 'ChangeStatusProductModal',

  props: ['selectedProduct'],

  computed: {
    ...mapState({
      isLoading: (state) => state.employees.isLoading,
    }),
  },

  methods: {
    setActive() {
      this.$store
        .dispatch(productAction.changeStatus, this.selectedProduct.id)
        .then(() => {
          this.$store.state.products.productsList.find((product) => {
            return product.id === this.selectedProduct.id
          }).is_active = !this.selectedProduct.is_active
        })
        .then(() => {
          this.$nextTick(() => {
            this.$bvModal.hide('change-status-product-modal')
          })
        })
    },
  },
}
</script>

<style scoped></style>
