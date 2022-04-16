<template>
    <b-modal
        id="edit-employee-modal"
        size="xl"
        title="Extra Large Modal"
        hide-footer
    >
        <div class="container-fluid" v-b-visible="loadRoles">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img
                                    class="profile-user-img img-fluid img-circle"
                                    src="/images/dev/user2-160x160.jpg"
                                    alt="User profile picture"
                                >
                            </div>
                            <h3 class="profile-username text-center">{{ selectedEmployee.employee }}</h3>
                            <p class="profile-email text-muted text-center">{{ selectedEmployee.email }}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Created</b>
                                    <a class="float-right">{{ selectedEmployee.createdAt }}</a>
                                </li>
                            </ul>

                            <b-button
                                size="sm"
                                variant="success"
                                @click="onUpdate"
                                :disabled="isLoading"
                            >
                                <span v-if="isLoading">
                                    <b-spinner small type="grow"></b-spinner>
                                    Execute...
                                </span>
                                <span v-else>Update</span>
                            </b-button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <b-form-group
                                label="Employee name:"
                                label-for="employee-name"
                            >
                                <b-form-input
                                    id="employee-name"
                                    name="employee-name"
                                    v-model="selectedEmployee.employee"
                                    type="text"
                                    placeholder="Employee name"
                                    :disabled="isLoading"
                                    required
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group
                                label="Employee role:"
                                label-for="employee-role"
                            >
                                <b-form-select
                                    :options="roleOptions"
                                    v-model="selectedEmployee.role"
                                    id="employee-role"
                                    name="employee-role"
                                    :disabled="isLoading"
                                ></b-form-select>
                            </b-form-group>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </b-modal>
</template>

<script>
    import { mapState } from 'vuex'
    import { actionTypes as rolesAction } from '../../../store/roles/actions'
    import { actionTypes as employeesAction } from "../../../store/employees/actions";

    export default {
        name: 'EditEmployeeModal',

        props: ['selectedEmployee'],

        computed: {
            ...mapState({
                isLoading: (state) => state.employees.isLoading,
                roleOptions: (state) => state.roles.rolesList
            }),
        },

        methods: {
            onUpdate() {
                this.$store.dispatch(employeesAction.updateEmployee, {
                    id: this.selectedEmployee.id,
                    name: this.selectedEmployee.employee,
                    role: this.selectedEmployee.role,
                }).then(() => {
                    this.$store.dispatch(employeesAction.init)
                })
            },
            loadRoles(isVisible) {
                if (isVisible) {
                    this.$store.dispatch(rolesAction.selection)
                }
            }
        },
    }
</script>

<style scoped>

</style>
