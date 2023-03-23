<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <PageViewHeadComponent>
    <template v-slot:name-rank>
      <h4 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ route.params.name }}</h4>
      <h4 class="mb-2 text-2xl text-gray-900 dark:text-white">{{ 'Artist - ' + album.artist }}</h4>
      <button @click="favoriteAlbum"
              class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
        </svg>
        Add to Favorites
      </button>
      <p class="text-white dark:text-white">
        {{ album.url }}
      </p>
    </template>
    <template v-slot:image>
      <img
        class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125"
        :src="album.image[3]['#text']" alt=""
      />
    </template>
    <template v-slot:image-info>
      <h1 class="font-dmserif text-3xl font-bold text-white">{{ route.params.name }}</h1>
      <p
        class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
        {{ 'Playcount - ' + album.playcount }}
      </p>
    </template>

    <div>
    </div>
  </PageViewHeadComponent>
</template>

<script>
import {useRoute} from "vue-router";
import store from "../../store/index.js";
import { ref } from "vue";
import PageViewHeadComponent from "../../components/PageViewHeadComponent.vue";

export default {
  name: "AlbumView",
  components: {
    PageViewHeadComponent
  },
  setup() {
    const route = useRoute()
    const album = ref({});
    let userId = ref('')

    if (route.params.name) {
      store.dispatch('getCurrentAlbum', route.params.artist, route.params.name)
        .then(data => {
          album.value = data.album;
        });
    }

    userId.value = store.state.user.data.id;

    const fav = {
      user_id: userId.value.toString(),
      album_name: route.params.name,
      artist_name: album.value.artist,
      image: album.value.image[3]['#text'],
      album_url: album.value.url,
    }

    function favoriteAlbum(ev) {
      ev.preventDefault();
      store
        .dispatch("favoriteAlbum", fav)
    }

    return {
      userId,
      route,
      album,
      fav,
      favoriteAlbum
    }
  },
}
</script>

<style scoped>

</style>
