import {createStore} from "vuex";

const store = createStore({
  state: {
    user: {
      data: {
        user: {
          name: 'Alpha Matumbura',
          email: 'alphamonline@gmail.com',
          imageUrl: 'https://picsum.photos/150',
        }
      },
      token: 123
    }
  },
  getters: {},
  actions: {},
  mutations: {
    logout: state => {
      state.user.data = {};
        state.user.token = null;
    }
  },
  modules: {},
})

export default store;
