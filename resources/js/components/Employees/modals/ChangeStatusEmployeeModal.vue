<template>
    <b-modal
        id="change-status-employee-modal"
        size="md"
        centered
        :title="selectedEmployee.isActive ? 'Deactivate employee' : 'Activate employee'"
    >
        You are going to
        {{ selectedEmployee.isActive ? 'deactivate' : 'activate' }}
        employee: <strong>{{ selectedEmployee.employee }} ({{ selectedEmployee.email }})</strong>. Are you sure?

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
                @click="setActive"
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
    import {actionTypes as employeeAction} from '../../../store/employees/actions'
    import {mapState} from "vuex";

    export default {
        name: 'ChangeStatusEmployeeModal',

        props: ['selectedEmployee'],

        computed: {
            ...mapState({
                isLoading: (state) => state.employees.isLoading,
            }),
        },

        methods: {
            setActive() {
                this.$store.dispatch(employeeAction.changeStatus, this.selectedEmployee.id).then(() => {
                    this.$store.state.employees.employeesList.find((employee) => {
                        return employee.id === this.selectedEmployee.id
                    }).isActive = !this.selectedEmployee.isActive
                }).then(() => {
                    this.$nextTick(() => {
                        this.$bvModal.hide('change-status-employee-modal')
                    })
                })
            },
        }
    }
</script>

<style scoped>

</style>
