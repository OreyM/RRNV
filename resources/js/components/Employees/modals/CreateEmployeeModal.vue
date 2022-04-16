<template>
    <b-modal
        id="create-employee-modal"
        size="xl"
        title="Create new Employee"
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
                            <h3 class="profile-username text-center mb-4">{{ creationEmployee.name }}</h3>
                            <p class="profile-email text-muted text-center mb-4">{{ creationEmployee.email }}</p>

                            <b-button
                                size="sm"
                                variant="success"
                                @click="onCreate"
                                :disabled="isLoading"
                            >
                                <span v-if="isLoading">
                                    <b-spinner small type="grow"></b-spinner>
                                    Create...
                                </span>
                                <span v-else>Create</span>
                            </b-button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <b-form>
                                <b-form-group
                                    label="Employee name:"
                                    label-for="employee-name"
                                >
                                    <b-form-input
                                        id="employee-name"
                                        name="employee-name"
                                        v-model="creationEmployee.name"
                                        type="text"
                                        placeholder="Employee name"
                                        :disabled="isLoading"
                                        required
                                        autocomplete="name"
                                        autofocus
                                    ></b-form-input>
                                </b-form-group>

                                <b-form-group
                                    label="Employee email:"
                                    label-for="employee-email"
                                >
                                    <b-form-input
                                        id="employee-email"
                                        name="employee-email"
                                        v-model="creationEmployee.email"
                                        type="email"
                                        placeholder="Employee email"
                                        :disabled="isLoading"
                                        required
                                        autocomplete="email"
                                    ></b-form-input>
                                </b-form-group>

                                <b-form-group
                                    label="Employee password:"
                                    label-for="employee-password"
                                >
                                    <b-form-input
                                        id="employee-password"
                                        name="employee-password"
                                        v-model="creationEmployee.password"
                                        type="password"
                                        placeholder="Employee password"
                                        :disabled="isLoading"
                                        required
                                        autocomplete="new-password"
                                    ></b-form-input>
                                </b-form-group>

                                <b-form-group
                                    label="Confirmation employee password:"
                                    label-for="employee-password-confirmation"
                                >
                                    <b-form-input
                                        id="employee-password-confirmation"
                                        name="employee-password-confirmation"
                                        v-model="creationEmployee.passwordConfirm"
                                        type="password"
                                        placeholder="Confirmation employee password"
                                        :disabled="isLoading"
                                        required
                                        autocomplete="new-password"
                                    ></b-form-input>
                                </b-form-group>

                                <b-form-group
                                    label="Employee role:"
                                    label-for="employee-role"
                                >
                                    <b-form-select
                                        :options="roleOptions"
                                        v-model="creationEmployee.role"
                                        id="employee-role"
                                        name="employee-role"
                                        :disabled="isLoading"
                                        value-field="alias"
                                        text-field="displayName"
                                        required
                                    >
                                        <template #first>
                                            <b-form-select-option
                                                :value="null"
                                                disabled
                                            >-- Please select a role --
                                            </b-form-select-option>
                                        </template>
                                    </b-form-select>
                                </b-form-group>

                                <b-form-group
                                    label="Employee status:"
                                    label-for="employee-status"
                                >
                                    <b-form-checkbox
                                        v-model="creationEmployee.status"
                                        id="employee-status"
                                        name="check-button"
                                        switch
                                    >
                                        <b>{{ creationEmployee.status ? 'Active' : 'Inactive' }}</b>
                                    </b-form-checkbox>
                                </b-form-group>
                            </b-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </b-modal>
</template>

<script>
    import { mapState } from 'vuex';
    import { actionTypes as employeesAction } from '../../../store/employees/actions'
    import { actionTypes as rolesAction } from '../../../store/roles/actions';

    export default {
        name: 'CreateEmployeeModal',

        data() {
            return {
                creationEmployee: {
                    name: '',
                    email: '',
                    role: '',
                    password: '',
                    passwordConfirm: '',
                    status: true,
                }
            }
        },

        computed: {
            ...mapState({
                isLoading: (state) => state.employees.isLoading,
                roleOptions: (state) => state.roles.rolesList
            }),
        },

        methods: {
            onCreate() {
                this.$store.dispatch(employeesAction.createEmployee, this.creationEmployee)
                .then(() => {
                    this.$store.dispatch(employeesAction.init)
                })
            },
            loadRoles(isVisible) {
                if (isVisible) {
                    this.$store.dispatch(rolesAction.init)
                }
            }
        }
    }
</script>

<style scoped>
    .profile-username, .profile-email {
        height: 12px;
    }
</style>
