<template>
    <div>
        <b-button
            size="lg"
            variant="success"
            v-b-modal.create-manufacturer-modal
        >
            New Manufacturer
        </b-button>

        <CreateManufacturerModal />
    </div>
</template>

<script>

    import CreateManufacturerModal from './modals/CreateManufacturerModal'

    export default {
        name: 'ManufacturerCreate',

        components: { CreateManufacturerModal },
    }
</script>

<style scoped>

</style>
