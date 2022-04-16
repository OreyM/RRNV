<template>
    <div>
        <b-button
            size="sm"
            variant="success"
            v-b-modal.create-stock-status-modal
        >
            New Stock Status
        </b-button>

        <CreateStockStatusModal />
    </div>
</template>

<script>
    import CreateStockStatusModal from './modals/CreateStockStatusModal'

    export default {
        name: 'StockStatusCreate',

        components: { CreateStockStatusModal },
    }
</script>

<style scoped>

</style>
