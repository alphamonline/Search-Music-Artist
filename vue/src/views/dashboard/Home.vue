<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <PageComponent>
    <!--    Show top albums     -->
    <div>
      <div class="whitespace-pre-line">
        <h4
          class="pb-6 mt-6 text-md font-extrabold text-gray-900">
          Top Albums
        </h4>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        <div
          v-for="topAlbum in topAlbums"
          :key="topAlbum.name"
          class="max-w-sm bg-white"
        >
          <router-link :to="{ name: 'AlbumView', params: {name: topAlbum.name} }">
            <img class="h-auto max-w-full rounded-lg" :src="topAlbum.image[2].text" alt="">
          </router-link>
          <div class="p-5">
            <router-link
              :to="{ name: 'AlbumView', params: {name: topAlbum.name} }"
              class="text-blue-700 hover:underline dark:text-blue-500"
            >
              <p class="mb-2 font-bold tracking-tight text-gray-900 dark:text-gray-900">{{ topAlbum.name }}</p>
            </router-link>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ topAlbum.artist.name }}</p>
          </div>
        </div>
      </div>
    </div>
    <!--/    Show top albums     -->

    <!--    Show top artist     -->
    <div>
      <div class="whitespace-pre-line">
        <h4
          class="pb-6 mt-6 text-md font-extrabold text-gray-900">
          Top Artist
        </h4>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        <div
          v-for="topArtist in topArtists"
          :key="topArtist.name"
          class="max-w-sm bg-white"
        >
          <router-link :to="{ name: 'ArtistView', params: {name: topArtist.name} }">
            <img class="h-auto max-w-full rounded-lg" :src="topArtist.image[2].text" alt="">
          </router-link>
          <div class="p-5">
            <router-link :to="{ name: 'ArtistView', params: {name: topArtist.name} }"
                         class="text-blue-700 hover:underline dark:text-blue-500"
            >
              <p class="mb-2 font-bold tracking-tight text-gray-900 dark:text-gray-900">{{ topArtist.name }}</p>
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <!--/    Show top artist     -->

  </PageComponent>
</template>

<script>
import store from "../../store/index.js";
import {computed} from "vue";
import PageComponent from "../../components/PageComponent.vue";

export default {
  components: {
    PageComponent
  },
  setup() {
    const topAlbums = computed(() => store.state.topAlbums);
    const topArtists = computed(() => store.state.topArtists);

    return {
      topAlbums,
      topArtists
    };
  },

}
</script>

<style scoped>

</style>
