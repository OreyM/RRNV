<template>
    <div>
        <b-button
            size="sm"
            variant="success"
            v-b-modal.create-role-modal
        >
            New Role
        </b-button>

        <CreateRoleModal />
    </div>
</template>

<script>
    import CreateRoleModal from './modals/CreateRoleModal'

    export default {
        name: 'RoleCreate',

        components: { CreateRoleModal }
    }
</script>

<style scoped>

</style>
