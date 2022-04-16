<template>
    <b-modal
        id="edit-role-modal"
        size="xl"
        title="Edit Role"
        hide-footer
    >
        <div class="container-fluid" v-b-visible="loadPermissions">
            <div class="row">
                <div class="col-md-6">
                    <h4>Role data</h4>
                    <div class="card">
                        <div class="card-body">
                            <b-form-group
                                label="Role display name:"
                                label-for="role-display-name"
                            >
                                <b-form-input
                                    id="role-display-name"
                                    name="role-display-name"
                                    v-model="selectedRole.displayName"
                                    type="text"
                                    placeholder="Role display name"
                                    :disabled="isLoading"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group
                                label="Role alias:"
                                label-for="role-alias"
                            >
                                <b-form-input
                                    id="role-alias"
                                    name="role-alias"
                                    v-model="selectedRole.alias"
                                    type="text"
                                    placeholder="Role alias"
                                    :disabled="isLoading"
                                    required
                                ></b-form-input>
                            </b-form-group>
                            <b-form-group
                                label="Role description:"
                                label-for="role-description"
                            >
                                <b-form-textarea
                                    id="role-description"
                                    v-model="selectedRole.description"
                                    placeholder="Role description"
                                    rows="3"
                                    max-rows="6"
                                    :disabled="isLoading"
                                ></b-form-textarea>
                            </b-form-group>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h4>Role permissions</h4>
                    <div class="accordion" role="tablist">
                        <b-card
                            v-for="permissionGroup in permissionsList"
                            :key="permissionGroup.group"
                            no-body
                            class="mb-1"
                        >
                            <b-card-header header-tag="header" class="p-1" role="tab">
                                <b-button
                                    block v-b-toggle="'accordion-' + permissionGroup.group"
                                    variant="info"
                                >{{ permissionGroup.group_description }}</b-button>
                            </b-card-header>
                            <b-collapse
                                :id="'accordion-' + permissionGroup.group"
                                accordion="permission-accordion"
                                role="tabpanel"
                            >
                                <b-card-body>
                                    <b-form-checkbox-group
                                        v-model="selectedPermissions"
                                        :options="permissionGroup.permissions"
                                        class="mb-3"
                                        value-field="name"
                                        text-field="display_name"
                                    ></b-form-checkbox-group>
                                </b-card-body>
                            </b-collapse>
                        </b-card>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
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
    </b-modal>
</template>

<script>
    import { mapState } from 'vuex'
    import { actionTypes as rolesAction } from '../../../store/roles/actions'
    import { actionTypes as permissionsAction } from '../../../store/permissions/actions'

    export default {
        name: 'EditRoleModal',

        props: ['selectedRole'],

        computed: {
            ...mapState({
                isLoading: (state) => state.roles.isLoading,
                permissionsList: (state) => state.permissions.permissionsList,
            }),
            selectedPermissions: {
                get() {
                    return this.$store.state.permissions.selectedPermissions
                },
                set(newPermissions) {
                    this.$store.state.permissions.selectedPermissions = newPermissions
                }
            }
        },

        methods: {
            onUpdate() {
                this.$store.dispatch(rolesAction.updateRole, {
                    role: this.selectedRole,
                    permissions: this.selectedPermissions
                })
            },
            loadPermissions(isVisible) {
                if (isVisible) {
                    this.$store.dispatch(permissionsAction.selection).then(() => {
                        this.$store.dispatch(permissionsAction.selected, this.selectedRole.alias)
                    })
                }
            }
        }
    }
</script>

<style scoped>

</style>
