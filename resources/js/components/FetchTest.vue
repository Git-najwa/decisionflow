<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-2">Test API fetchJson</h2>
    <div v-if="loading">Chargement...</div>
    <pre v-else-if="data">{{ data }}</pre>
    <div v-else class="text-red-500">Erreur : {{ error?.statusText }}</div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { fetchJson } from '@/utils/fetchJson';

const data = ref(null);
const error = ref(null);
const loading = ref(true);

onMounted(() => {
  const { request } = fetchJson({
    url: '/api/test',  // ✅ route API correcte
    baseUrl: null      // ✅ désactive tout préfixe auto
  });

  request
    .then(res => {
      data.value = res;
    })
    .catch(err => {
      error.value = err;
    })
    .finally(() => {
      loading.value = false;
    });
});
</script>
