<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
  <PageViewHeadComponent>
    <template v-slot:name-rank>
      <h4 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{model.name}}</h4>
      <h4 class="mb-2 text-2xl text-gray-900 dark:text-white">{{'Ranked - #'+model.attr.rank}}</h4>
    </template>
    <template  v-slot:artist>
      <h4 class="mb-2 text-2xl text-gray-900 dark:text-white">{{model.artist.name}}</h4>
    </template>
    <template v-slot:image>
      <img
        class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125"
        :src="model.image[3].text" alt=""
      />
    </template>
    <template v-slot:image-info>
      <h1 class="font-dmserif text-3xl font-bold text-white">{{model.name}}</h1>
      <p
        class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
        {{ 'Rank - #'+model.attr.rank }}
      </p>
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
import {useRoute} from "vue-router";
import store from "../../store/index.js";
import {ref} from "vue";
import PageViewHeadComponent from "../../components/PageViewHeadComponent.vue";

export default {
  name: "AlbumView",
  components: {
    PageViewHeadComponent
  },
  setup() {
    const route = useRoute();
    let model = ref({
      name: "",
      mbid: "",
      url: "",
      artist: {
        name: "",
        mbid: "",
        url: ""
      },
      image: [
        {
          text: "",
          size: ""
        },
        {
          text: "",
          size: ""
        },
        {
          text: "",
          size: ""
        },
        {
          text: "",
          size: ""
        }
      ],
      attr: {
        rank: ""
      }
    })

    if (route.params.rank) {
      model.value = store.state.topAlbums.find(
        (a) => a.attr.rank === route.params.rank
      );
    }

    return {
      route,
      model
    }
  },
}
</script>

<style scoped>

</style>
