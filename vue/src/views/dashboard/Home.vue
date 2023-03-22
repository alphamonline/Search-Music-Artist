<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <PageComponent>
    <template v-slot:header>
      <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Home</h1>

        <form>
          <label for="default-search"
                 class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                   viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input type="search" id="default-search"
                   class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Search..." required>
            <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Search
            </button>
          </div>
        </form>
      </div>
    </template>
    <!--    Show top albums     -->
    <div>
      <div class="whitespace-pre-line">
        <h4
          class="pb-6 mt-6 text-center text-2xl font-extrabold text-gray-900 underline decoration-blue-800 underline-offset-1 ">
          Top Albums
        </h4>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        <div
          v-for="topAlbum in topAlbums"
          :key="topAlbum.attr.rank"
          class="max-w-sm bg-white"
        >
          <router-link :to="{ name: 'AlbumView', params: {rank: topAlbum.attr.rank} }">
            <img class="h-auto max-w-full rounded-lg" :src="topAlbum.image[2].text" alt="">
          </router-link>
          <div class="p-5">
            <router-link
              :to="{ name: 'AlbumView', params: {rank: topAlbum.attr.rank} }"
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

    <!--    Show top tracks     -->
    <div>
      <div class="whitespace-pre-line">
        <h4
          class="pb-6 mt-6 text-center text-2xl font-extrabold text-gray-900 underline decoration-blue-800 underline-offset-1 ">
          Top Tracks
        </h4>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        <div
          v-for="topTrack in topTracks"
          :key="topTrack.attr.rank"
          class="max-w-sm bg-white"
        >
          <router-link :to="{ name: 'TrackView', params: {rank: topTrack.attr.rank} }">
            <img class="h-auto max-w-full rounded-lg" :src="topTrack.image[2].text" alt="">
          </router-link>
          <div class="p-5">
            <router-link :to="{ name: 'TrackView', params: {rank: topTrack.attr.rank} }"
                         class="text-blue-700 hover:underline dark:text-blue-500"
            >
              <p class="mb-2 font-bold tracking-tight text-gray-900 dark:text-gray-900">{{ topTrack.name }}</p>
            </router-link>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ topTrack.artist.name }}</p>
          </div>
        </div>
      </div>
    </div>
    <!--/    Show top tracks     -->

    <!--    Show top artist     -->
    <div>
      <div class="whitespace-pre-line">
        <h4
          class="pb-6 mt-6 text-center text-2xl font-extrabold text-gray-900 underline decoration-blue-800 underline-offset-1 ">
          Top Artist
        </h4>
      </div>

      <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        <div
          v-for="topArtist in topArtists"
          :key="topArtist.attr.rank"
          class="max-w-sm bg-white"
        >
          <router-link :to="{ name: 'ArtistView', params: {rank: topArtist.attr.rank} }">
            <img class="h-auto max-w-full rounded-lg" :src="topArtist.image[2].text" alt="">
          </router-link>
          <div class="p-5">
            <router-link :to="{ name: 'ArtistView', params: {rank: topArtist.attr.rank} }"
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
    const topTracks = computed(() => store.state.topTracks);

    return {
      topAlbums,
      topArtists,
      topTracks
    };
  },

}
</script>

<style scoped>

</style>
