<template>
    <b-modal
        id="delete-role-modal"
        size="md"
        centered
        title="Delete role"
    >
        You are going to <strong class="text-danger">delete</strong> role:
        <strong>{{ selectedRole.displayName }}</strong>.
        Are you sure?

        <template #modal-footer="{ ok, cancel, hide }">
            <b-button
                size="sm"
                variant="danger"
                @click="cancel()"
                :disabled="isLoading"
            >
                Go back
            </b-button>
            <b-button
                size="sm"
                variant="success"
                @click="onDelete"
                :disabled="isLoading"
            >
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
    import { actionTypes as rolesAction } from '../../../store/roles/actions'

    export default {
        name: 'DeleteRoleModal',

        props: ['selectedRole'],

        computed: {
            ...mapState({
                isLoading: (state) => state.roles.isLoading,
                rolesList: (state) => state.roles.rolesList
            }),
        },

        methods: {
            onDelete() {
                this.$store.dispatch(rolesAction.deleteRole, this.selectedRole.id).then(() => {
                    const index = this.rolesList.indexOf(this.selectedRole)
                    this.$store.state.roles.rolesList.splice(index, 1)
                }).then(() => {
                    this.$nextTick(() => {
                        this.$bvModal.hide('delete-role-modal')
                    })
                })
            },
        }
    }
</script>

<style scoped>

</style>
