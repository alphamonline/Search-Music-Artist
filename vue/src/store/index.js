import {createStore} from "vuex";
import axiosClient from "../axios";
import createPersistedState from 'vuex-persistedstate'

const store = createStore({
  plugins: [createPersistedState({
    storage: window.sessionStorage,
  })],
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("TOKEN"),
    },
    album: {
      data: {},
    },
    currentAlbum: {
      data: {},
    },
    artist: {
      data: {},
    },
    currentArtist: {
      data: {},
    },
    favAlbum: {
      data: {},
    },
    favArtist: {
      data: {},
    },
    currentFavAlbum: {
      data: {},
    },
    currentFavArtist: {
      data: {},
    },
    favoriteAlbums: {
      data: []
    },
    favoriteArtists: {
      data: []
    },
  },
  getters: {},
  actions: {
    // Registration | Login | get User | Logout Actions
    google() {
      return axiosClient.get('/google/redirect')
        .then(({data}) => {
          if (data.url) {
            window.location.href = data.url
          }
        })
    },
    googleCallback({commit}, payload) {
      return axiosClient.get('/google/callback?code=', {params: payload})
        .then(({data}) => {
          commit('setUser', data.user);
          commit('setToken', data.token)
          return data;
        })
    },
    register({commit}, payload) {
      return axiosClient.post('/register', payload)
        .then(({data}) => {
          commit('setUser', data.user);
          commit('setToken', data.token)
          return data;
        })
    },
    login({commit}, payload) {
      return axiosClient.post('/login', payload)
        .then(({data}) => {
          commit('setUser', data.user);
          commit('setToken', data.token)
          return data;
        })
    },
    getUser({commit}) {
      return axiosClient.get('/user')
        .then(res => {
          console.log(res);
          commit('setUser', res.data)
        })
    },
    logout({commit}) {
      return axiosClient.post('/logout')
        .then(response => {
          commit('logout')
          return response;
        })
    },

    //Get requests Actions
    searchAlbum({commit}, name) {
      return axiosClient.get('/search-album/'+name)
      .then(({data}) => {
        commit('setAlbum', data.album);
        return data;
      })
        .catch((err) => {
          throw err;
        });
    },
    searchArtist({commit}, name) {
      return axiosClient.get('/search-artist/'+name)
        .then(({data}) => {
          commit('setArtist', data.artist);
          return data;
        })
        .catch((err) => {
          throw err;
        });
    },

    //GetCurrent Album
    getCurrentAlbum({commit}, artist, name) {
      return axiosClient.get('/current-album/'+ artist +'/'+name)
        .then(({data}) => {
          commit('setCurrentAlbum', data.album);
          return data;
        })
        .catch((err) => {
          throw err;
        });
    },

    //Get Current Artist
    getCurrentArtist({commit}, name) {
      return axiosClient.get('/current-artist/'+name)
        .then(({data}) => {
          commit('setCurrentArtist', data.artist);
          return data;
        })
        .catch((err) => {
          throw err;
        });
    },

    //Get requests: favorites Action
    getFavoriteAlbums({commit}) {
      return axiosClient.get('/favorite-albums')
        .then(({data}) => {
          commit('setFavAlbum', data.favAlbum);
          return data;
        })
    },
    getFavoriteArtist({commit}) {
      return axiosClient.get('/favorite-artists')
        .then(({data}) => {
          commit('setFavArtist', data.favArtist);
          return data;
        })
    },

    //Add to favorites Actions
    favoriteAlbum({commit}, payload) {
      return axiosClient.post('/favorite-albums', payload)
        .then(({data}) => {
          commit('setFavAlbum', data.favAlbum);
          return data;
        })
    },
    favoriteArtist({commit}, payload) {
      return axiosClient.post('/favorite-artists', payload)
        .then(({data}) => {
          commit('setFavArtist', data.favArtist);
          return data;
        })
    },

    //Get currentFav Actions
    getCurrentFavAlbum({commit}, payload) {
      return axiosClient.get('/favorite-albums', payload)
        .then(({data}) => {
          commit('setCurrentFavAlbum', data.currentFavAlbum);
          return data;
        })
    },
    getCurrentFavArtist({commit}, payload) {
      return axiosClient.get('/favorite-artists', payload)
        .then(({data}) => {
          commit('setCurrentFavArtist', data.currentFavArtist);
          return data;
        })
    },

    //Destroy to favorites Actions
    deleteFavAlbum({commit}, payload) {
      return axiosClient.delete('/favorite-albums', payload)
    },
    deleteFavArtist({commit}, payload) {
      return axiosClient.delete('/favorite-artists', payload)
    },
  },
  mutations: {
    setAlbum: (state, album) => {
      state.album.data = album;
    },
    setArtist: (state, artist) => {
      state.artist.data = artist;
    },
    setCurrentAlbum: (state, album) => {
      state.currentAlbum.data = album;
    },
    setCurrentArtist: (state, artist) => {
      state.currentArtist.data = artist;
    },
    setFavAlbum: (state, favAlbum) => {
      state.favAlbum.data = favAlbum;
    },
    setFavArtist: (state, favArtist) => {
      state.favArtist.data = favArtist;
    },
    setCurrentFavAlbum: (state, album) => {
      state.currentFavAlbum.data = album;
    },
    setCurrentFavArtist: (state, artist) => {
      state.currentFavArtist.data = artist;
    },
    logout: (state) => {
      state.user.token = null;
      state.user.data = {};
      sessionStorage.removeItem("TOKEN");
      sessionStorage.clear();
    },
    setUser: (state, user) => {
      state.user.data = user;
    },
    setToken: (state, token) => {
      state.user.token = token;
      sessionStorage.setItem('TOKEN', token);
    },
  },
  modules: {},
})

export default store;
