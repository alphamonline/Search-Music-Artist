<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <PageComponent>
    <!--    Show Favorite Albums here     -->
    <div>
      <div class="flex flex-col items-center pb-10">
        <div class="flex mt-4 space-x-3 md:mt-6">
          <button @click="albums" class="inline-flex items-center px-4 py-2 text-md font-medium text-center text-gray-900">Albums</button>
          <button @click="artists" class="inline-flex items-center px-4 py-2 text-md font-medium text-center text-gray-900 dark:text-gray-900">Artist</button>
        </div>
      </div>
      <div class="flex justify-between items-center">
        <div class="relative overflow-x-auto">
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
                Remove
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
                <a href="#" data-modal-target="editUserModal" data-modal-show="editUserModal"
                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                  </svg>
                </a>
              </td>
            </tr>
            </tbody>
          </table>
        </div>


      </div>

    </div>
    <!--/    Show Favorite Albums here     -->

    <!--    Show Favorite Artist here     -->
    <div>
      <div class="flex justify-between items-center">
        <div class="relative overflow-x-auto">
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
                Remove
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
                <a href="#" data-modal-target="editUserModal" data-modal-show="editUserModal"
                   class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                       stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                  </svg>
                </a>
              </td>
            </tr>
            </tbody>
          </table>
        </div>


      </div>

    </div>
    <!--/    Show Favorite Albums here     -->

  </PageComponent>
</template>

<script>
import PageComponent from "../../components/PageComponent.vue";
import {computed} from "vue";
import store from "../../store/index.js";

export default {
  components: {
    PageComponent
  },
  setup() {
    const favoriteAlbums = computed(() => store.state.favoriteAlbums);
    const favoriteArtists = computed(() => store.state.favoriteArtists);

    return {
      favoriteAlbums,
      favoriteArtists
    };
  },
}
</script>

<style scoped>

</style>
