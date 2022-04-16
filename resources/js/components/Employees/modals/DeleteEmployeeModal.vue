<template>
    <b-modal
        id="delete-employee-modal"
        size="md"
        centered
        title="Delete employee"
    >
        You are going to <strong class="text-danger">delete</strong> employee:
        <strong>{{ selectedEmployee.employee }} ({{ selectedEmployee.email }})</strong>.
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
                @click="deleteEmployee"
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
                employeesList: (state) => state.employees.employeesList
            }),
        },

        methods: {
            deleteEmployee() {
                this.$store.dispatch(employeeAction.deleteEmployee, this.selectedEmployee.id).then(() => {
                    const index = this.employeesList.indexOf(this.selectedEmployee)
                    this.$store.state.employees.employeesList.splice(index, 1)
                }).then(() => {
                    this.$nextTick(() => {
                        this.$bvModal.hide('delete-employee-modal')
                    })
                })
            },
        }
    }
</script>

<style scoped>

</style>
