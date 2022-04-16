<template>
  <b-modal id="delete-product-modal" size="md" centered title="Delete Product">
    You are going to <strong class="text-danger">delete</strong> product:
    <strong>{{ selectedProduct.name }}</strong
    >. Are you sure?

    <template #modal-footer="{ ok, cancel, hide }">
      <b-button size="sm" variant="danger" @click="cancel()" :disabled="isLoading">
        Go back
      </b-button>
      <b-button size="sm" variant="success" @click="onDelete" :disabled="isLoading">
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
import { mapState } from 'vuex'
import { actionTypes as productAction } from '../../../../store/catalog/products/actions'

export default {
  name: 'DeleteProductModal',

  props: ['selectedProduct'],

  computed: {
    ...mapState({
      isLoading: (state) => state.products.isLoading,
      productsList: (state) => state.products.productsList,
    }),
  },

  methods: {
    onDelete() {
      this.$store
        .dispatch(productAction.removeProduct, this.selectedProduct.id)
        .then(() => {
          const index = this.productsList.indexOf(this.selectedProduct)
          this.$store.state.products.productsList.splice(index, 1)
        })
        .then(() => {
          this.$nextTick(() => {
            this.$bvModal.hide('delete-product-modal')
          })
        })
    },
  },
}
</script>

<style scoped></style>
