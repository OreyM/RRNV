const selection = () => axios.get('/permissions/selection')

const selected = (credential) => axios.get('/permissions/selected/' + credential)

export default {
    selection,
    selected
}
