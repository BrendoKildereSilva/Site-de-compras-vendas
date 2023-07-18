

<template>
  <component :is="layout">
    <router-view/>
  </component>
</template>

<script>
import { computed } from 'vue';
import { useRoute } from 'vue-router';

export default {
  
  setup(){
    const router = useRoute();
    // dentro do (plugins/router.js) tem um parametro meta que informa o layout de cada component
    const layout = computed(
      () => router.meta.layout
    )

    return {
      layout
    }
  }
}
</script>


