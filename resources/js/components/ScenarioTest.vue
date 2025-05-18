<template>
  <div class="p-4">
    <h2 class="text-lg font-bold">Test Scenarios API</h2>
    <div v-if="loading">Chargement...</div>
    <pre v-else-if="data">{{ data }}</pre>
    <div v-else class="text-red-500">Erreur : {{ error?.statusText }}</div>
  </div>
</template>

<script setup>
import { useFetchJson } from '@/composables/useFetchJson';

const { data, error, loading } = useFetchJson('/api/scenarios');
</script>
