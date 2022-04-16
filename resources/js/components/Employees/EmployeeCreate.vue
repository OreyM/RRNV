<template>
    <div>
        <b-button
            size="sm"
            variant="success"
            v-b-modal.create-employee-modal
        >
            New Employee
        </b-button>

        <CreateEmployeeModal />
    </div>
</template>

<script>
    import CreateEmployeeModal from './modals/CreateEmployeeModal'

    export default {
        name: 'EmployeeCreate',

        components: { CreateEmployeeModal }
    }
</script>

<style scoped>

</style>
