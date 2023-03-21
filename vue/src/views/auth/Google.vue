<template>
  <h1>Google sign in, please wait...</h1>
</template>

<script>
import store from "../../store/index.js";
import { useRoute, useRouter } from 'vue-router'

export default {
  name: "Google",
  setup() {
    const router = useRouter()
    const route = useRoute()
    console.log(route.query);

    store.dispatch("googleCallback", route.query)
      .then(() => {
        router.push({
          name: "Home",
        });
      })
  }
}
</script>

<style scoped>

</style>
