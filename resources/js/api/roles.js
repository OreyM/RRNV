const all = () => axios.get('/roles/all')

const selection = () => axios.get('/roles/selection')

const createRole = (credentials) => {
    const {
        alias: name,
        displayName: display_name,
        description,
        permissions
    } = credentials

    return axios.post('/role/create', { name, display_name, description, permissions })
}

const updateRole = (credentials) => {
    const {
        id,
        alias: name,
        displayName: display_name,
        description
    } = credentials.role

    const { permissions } = credentials

    return axios.put('/role/update', { id, name, display_name, description, permissions })
}

const deleteRole = (credentials) => {
    return axios.post('/role/delete', { id: credentials })
}

export default {
    all,
    createRole,
    deleteRole,
    selection,
    updateRole
}
