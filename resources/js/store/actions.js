const actions = {
    getData(context, payload) {
        // console.log(payload)
        axios.get('/users')
        .then(response => context.commit('getData', response.data))
        .catch(error => this.errors = error.response.state)
    },
}
export default actions
