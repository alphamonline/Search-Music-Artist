import {createStore} from "vuex";
import axiosClient from "../axios";
import createPersistedState from 'vuex-persistedstate'

const topAlbumsTemp = [
  {
    name: "Dynamite",
    mbid: "",
    url: "https://www.last.fm/music/BTS",
    artist: {
      name: "BTS",
      mbid: "0d79fe8e-ba27-4859-bb8c-2f255f346853",
      url: "https://www.last.fm/music/BTS"
    },
    image: [
      {
        text: "https://lastfm.freetls.fastly.net/i/u/34s/41b15d8a0ad6a81323b598bfb19cede9.png",
        size: "small"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/64s/41b15d8a0ad6a81323b598bfb19cede9.png",
        size: "medium"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/174s/41b15d8a0ad6a81323b598bfb19cede9.png",
        size: "large"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/41b15d8a0ad6a81323b598bfb19cede9.png",
        size: "extralarge"
      }
    ],
    attr: {
      rank: "1"
    }
  },
  {
    name: "The Perfect Red Velvet - The 2nd Album Repackage",
    mbid: "",
    url: "https://www.last.fm/music/Red+Velvet",
    artist: {
      name: "Red Velvet",
      mbid: "4f0cb3b7-6c06-4317-ae35-ddf3106a17ee",
      url: "https://www.last.fm/music/Red+Velvet"
    },
    image: [
      {
        text: "https://lastfm.freetls.fastly.net/i/u/34s/d31c361f1d65a46ed1d6aeaa99a23b9a.png",
        size: "small"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/64s/d31c361f1d65a46ed1d6aeaa99a23b9a.png",
        size: "medium"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/174s/d31c361f1d65a46ed1d6aeaa99a23b9a.png",
        size: "large"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/d31c361f1d65a46ed1d6aeaa99a23b9a.png",
        size: "extralarge"
      }
    ],
    attr: {
      rank: "2"
    }
  },
  {
    name: "Flowers",
    mbid: "",
    url: "https://www.last.fm/music/Miley+Cyrus",
    artist: {
      name: "Miley Cyrus",
      mbid: "7e9bd05a-117f-4cce-87bc-e011527a8b18",
      url: "https://www.last.fm/music/Miley+Cyrus"
    },
    image: [
      {
        text: "https://lastfm.freetls.fastly.net/i/u/34s/d0c2c98a6a2e3e3ca2ca647e70fbf5b7.png",
        size: "small"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/64s/d0c2c98a6a2e3e3ca2ca647e70fbf5b7.png",
        size: "medium"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/174s/d0c2c98a6a2e3e3ca2ca647e70fbf5b7.png",
        size: "large"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/d0c2c98a6a2e3e3ca2ca647e70fbf5b7.png",
        size: "extralarge"
      }
    ],
    attr: {
      rank: "3"
    }
  },
];

const topTracksTemp = [
  {
    name: "Billie Jean",
    duration: "293",
    mbid: "f980fc14-e29b-481d-ad3a-5ed9b4ab6340",
    url: "https://www.last.fm/music/Michael+Jackson/_/Billie+Jean",
    streamable: {
      text: "0",
      fulltrack: "0"
    },
    artist: {
      name: "Michael Jackson",
      mbid: "f27ec8db-af05-4f36-916e-3d57f91ecf5e",
      url: "https://www.last.fm/music/Michael+Jackson"
    },
    image: [
      {
        text: "https://lastfm.freetls.fastly.net/i/u/34s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "small"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/64s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "medium"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/174s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "large"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "extralarge"
      }
    ],
    attr: {
      rank: "1"
    }
  },
];

const topArtistsTemp = [
  {
    name: "Bee Gees",
    mbid: "bf0f7e29-dfe1-416c-b5c6-f9ebc19ea810",
    url: "https://www.last.fm/music/Bee+Gees",
    streamable: "0",
    image: [
      {
        text: "https://lastfm.freetls.fastly.net/i/u/34s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "small"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/64s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "medium"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/174s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "large"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "extralarge"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "mega"
      }
    ],
    attr: {
      rank: "1"
    }
  },
  {
    name: "Boney M.",
    mbid: "5403bf6e-bc1d-4e62-b31f-926a2bf66a14",
    url: "https://www.last.fm/music/Boney+M.",
    streamable: "0",
    image: [
      {
        text: "https://lastfm.freetls.fastly.net/i/u/34s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "small"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/64s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "medium"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/174s/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "large"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "extralarge"
      },
      {
        text: "https://lastfm.freetls.fastly.net/i/u/300x300/2a96cbd8b46e442fc41c2b86b821562f.png",
        size: "mega"
      }
    ],
    attr: {
      rank: "2"
    }
  },
];

const favoriteAlbumsTemp = [
  {
    id: 2,
    user_id: 3,
    album_name: "Flowers",
    artist_name: "Miley Cyrus",
    image: "https://lastfm.freetls.fastly.net/i/u/300x300/d0c2c98a6a2e3e3ca2ca647e70fbf5b7.png",
    album_url: "https://www.last.fm/music/Miley+Cyrus",
    artist_url: "https://www.last.fm/music/Miley+Cyrus",
    rank: "3"
  },
  {
    id: 3,
    user_id: 3,
    album_name: "The Perfect Red Velvet - The 2nd Album Repackage",
    artist_name: "Red Velvet",
    image: "https://lastfm.freetls.fastly.net/i/u/300x300/d31c361f1d65a46ed1d6aeaa99a23b9a.png",
    album_url: "https://www.last.fm/music/Red+Velvet",
    artist_url: "https://www.last.fm/music/Red+Velvet",
    rank: "2"
  },
  {
    id: 4,
    user_id: 3,
    album_name: "Dynamite",
    artist_name: "BTS",
    image: "https://lastfm.freetls.fastly.net/i/u/300x300/41b15d8a0ad6a81323b598bfb19cede9.png",
    album_url: "https://www.last.fm/music/BTS",
    artist_url: "https://www.last.fm/music/BTS",
    rank: "1"
  }
];

const favoriteArtistsTemp = [
  {
    id: 1,
    user_id: 3,
    artist_name: "Cher",
    image: "https://lastfm.freetls.fastly.net/i/u/300x300/3b54885952161aaea4ce2965b2db1638.png",
    mbid: null,
    url: null,
    rank: null
  },
  {
    id: 2,
    user_id: 3,
    artist_name: "Test",
    image: "https://lastfm.freetls.fastly.net/i/u/300x300/3b54885952161aaea4ce2965b2db1638.png",
    mbid: "32ca187e-ee25-4f18-b7d0-3b6713f24635",
    url: "https://www.last.fm/music/Test",
    rank: "2"
  }
];

const store = createStore({
  plugins: [createPersistedState({
    storage: window.sessionStorage,
  })],
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("TOKEN"),
    },
    favAlbum: {
      data: {},
    },
    favArtist: {
      data: {},
    },
    topAlbums: [...topAlbumsTemp],
    topTracks: [...topTracksTemp],
    topArtists: [...topArtistsTemp],
    favoriteAlbums: [...favoriteAlbumsTemp],
    favoriteArtists: [...favoriteArtistsTemp],
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
  },
  mutations: {
    setFavAlbum: (state, favAlbum) => {
      state.favAlbum.data = favAlbum;
    },
    updateFavAlbum: (state, favAlbum) => {
      state.favAlbum.data = favAlbum.map((a) =>{
        if (a.id === favAlbum.id) {
          return favAlbum.data
        }
        return a;
      });
    },
    setFavArtist: (state, favArtist) => {
      state.favArtist.data = favArtist;
    },
    updateFavArtist: (state, favArtist) => {
      state.favArtist.data = favArtist.map((a) =>{
        if (a.id === favArtist.id) {
          return favArtist.data
        }
        return a;
      });
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
