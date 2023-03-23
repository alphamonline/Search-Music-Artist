<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <PageViewHeadComponent>
    <template v-slot:name-rank>
      <h4 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ favArtist.artist_name }}</h4>
      <h4 class="mb-2 text-2xl text-gray-900 dark:text-white">{{ 'Ranked - #' + favArtist.rank }}</h4>
      <button @click="deleteFavArtist"
              class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Remove From Favorites
      </button>
    </template>
    <template v-slot:image>
      <img
        class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125"
        :src="favArtist.image" alt=""
      />
    </template>
    <template v-slot:image-info>
      <h1 class="font-dmserif text-3xl font-bold text-white">{{ favArtist.artist_name }}</h1>
      <p
        class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
        {{ 'Rank - #' + favArtist.rank }}
      </p>
      <button @click="deleteFavArtist"
              class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Remove From Favorites
      </button>
    </template>

    <div>
      <div class="whitespace-pre-line">
        <h4
          class="pb-6 mt-6 text-2xl font-extrabold text-gray-900 underline decoration-blue-800 underline-offset-1 ">
          Top Tracks
        </h4>
      </div>
    </div>
  </PageViewHeadComponent>
</template>

<script>
import PageViewHeadComponent from "../../components/PageViewHeadComponent.vue";
import {useRoute, useRouter} from "vue-router";
import {ref} from "vue";
import store from "../../store/index.js";

export default {
  name: "FavoriteArtistView",
  components: {
    PageViewHeadComponent
  },
  setup() {
    const route = useRoute()
    const router = useRouter()
    let favArtist = ref({
      id: "",
      user_id: "",
      artist_name: "",
      image: "",
      mbid: "",
      url: "",
      rank: ""
    })

    if (route.params.id) {
      favArtist.value = store.state.favoriteArtists.find(
        (a) => a.id === parseInt(route.params.id)
      );
    }

    function deleteFavArtist(ev) {
      ev.preventDefault();
      if (confirm('Are you sure you want to remove from list?')) {
        store
          .dispatch("deleteFavArtist", favArtist.value.id)
          .then(() => {
            router.push({
              name: "Favorites",
            });
          })
          .catch((err) => {
            throw err
          });
      }
    }

    return {
      route,
      router,
      favArtist,
      deleteFavArtist
    }
  },
}
</script>

<style scoped>

</style>
