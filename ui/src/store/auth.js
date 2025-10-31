export default {
    namespaced: true,
    state: {
        currentUser: JSON.parse(localStorage.getItem('currentUser')) || null,
        token: localStorage.getItem('token') || null,
    },
    mutations: {
        SET_USER(state, user) {
            state.currentUser = user;
            localStorage.setItem('currentUser', JSON.stringify(user));
        },
        SET_TOKEN(state, token) {
            state.token = token;
            localStorage.setItem('token', token)
        },
        LOGOUT(state) {
            state.currentUser = null;
            state.token = null;
            localStorage.removeItem('currentUser');
            localStorage.removeItem('token');
        },
    },
    actions: {
        login({ commit }, {user, token}) {
            commit('SET_USER', user);
            commit('SET_TOKEN', token);
        },
        logout({ commit }) {
            commit('LOGOUT');
        },
    },
    getters: {
        isAuthenticated: (state) => !!state.token,
        currentUser: (state) => state.currentUser,
    }
}
