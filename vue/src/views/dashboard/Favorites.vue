<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <PageComponent>
    <div class="whitespace-pre-line flex justify-between items-center sm:flex sm:space-y-0 sm:space-x-4">
      <div>
        <h4 class="inline-flex text-left px-4 py-2 text-md font-medium text-center text-gray-900">
          Albums
        </h4>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-white dark:text-gray-600">
          <tr>
            <th scope="col" class="px-6 py-3">
              Album Name
            </th>
            <th scope="col" class="px-6 py-3">
              Artist Name
            </th>
            <th scope="col" class="px-6 py-3">
              Rank
            </th>
            <th scope="col" class="px-6 py-3">
              Explore
            </th>
          </tr>
          </thead>
          <tbody>
          <tr
            v-for="favoriteAlbum in favoriteAlbums"
            :key="favoriteAlbum.id"
            class="bg-white border-b dark:bg-white dark:border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-200">
            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
              <img class="w-10 h-10 rounded-full" :src="favoriteAlbum.image" alt="">
              <div class="pl-3">
                <div class="text-base text-gray-900 font-semibold">{{ favoriteAlbum.album_name }}</div>
                <div class="font-normal text-gray-400">{{ favoriteAlbum.album_url }}</div>
              </div>
            </th>
            <td class="px-6 py-4">
              {{ favoriteAlbum.artist_name }}
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"/>
                </svg>
                {{ favoriteAlbum.rank }}
              </div>
            </td>
            <td class="px-6 py-4">
              <router-link :to="{ name: 'FavoriteAlbumView', params: { id: favoriteAlbum.id }}"
                           data-modal-target="editUserModal" data-modal-show="editUserModal"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
              </router-link>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="whitespace-pre-line flex justify-between items-center sm:flex sm:space-y-0 sm:space-x-4">
      <div>
        <h4 class="inline-flex pt-16 text-left px-4 py-2 text-md font-medium text-center text-gray-900">
          Artist
        </h4>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-500 uppercase bg-gray-50 dark:bg-white dark:text-gray-600">
          <tr>
            <th scope="col" class="px-6 py-3">
              Artist Name
            </th>
            <th scope="col" class="px-6 py-3">
              MBID
            </th>
            <th scope="col" class="px-6 py-3">
              Rank
            </th>
            <th scope="col" class="px-6 py-3">
              Explore
            </th>
          </tr>
          </thead>
          <tbody>
          <tr
            v-for="favoriteArtist in favoriteArtists"
            :key="favoriteArtist.id"
            class="bg-white border-b dark:bg-white dark:border-gray-100 hover:bg-gray-50 dark:hover:bg-gray-200">
            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
              <img class="w-10 h-10 rounded-full" :src="favoriteArtist.image" alt="">
              <div class="pl-3">
                <div class="text-base text-gray-900 font-semibold">{{ favoriteArtist.artist_name }}</div>
                <div class="font-normal text-gray-400">{{ favoriteArtist.url }}</div>
              </div>
            </th>

            <td class="px-6 py-4">
              {{ favoriteArtist.mbid }}
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5"/>
                </svg>
                {{ favoriteArtist.rank }}
              </div>
            </td>
            <td class="px-6 py-4">
              <router-link :to="{ name: 'FavoriteArtistView', params: { id: favoriteArtist.id }}"
                           data-modal-target="editUserModal" data-modal-show="editUserModal"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
              </router-link>
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </PageComponent>
</template>

<script>
import PageComponent from "../../components/PageComponent.vue";
import { ref } from "vue";
import store from "../../store/index.js";

export default {
  components: {
    PageComponent
  },
  setup() {
    const favoriteAlbums = ref([]);
    const favoriteArtists = ref([]);

    store.dispatch('getFavoriteAlbums')
      .then(data => {
        favoriteAlbums.value = data.data;
        console.log(favoriteAlbums.value)
      });

    store.dispatch('getFavoriteArtist')
      .then(data => {
        favoriteArtists.value = data.data;
        console.log(favoriteArtists.value)
      });

    return {
      favoriteAlbums,
      favoriteArtists,
    };
  },
}
</script>

<style scoped>

</style>
