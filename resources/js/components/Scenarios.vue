<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">Liste des scénarios</h2>

    <div v-if="loading">Chargement...</div>
    <div v-else-if="error" class="text-red-600">Erreur : {{ error.statusText || error }}</div>

    <!-- DEBUG TEMPORAIRE -->
    <!--<pre class="bg-gray-100 p-2 text-sm text-gray-600">{{ JSON.stringify(data, null, 2) }}</pre>-->

    <ul v-if="Array.isArray(data)" class="mt-4 space-y-2">
      <li v-for="scenario in data" :key="scenario.id" class="p-3 border rounded bg-white">
        <h3 class="font-semibold text-lg">{{ scenario.title }}</h3>
        <p v-if="scenario.description" class="text-sm text-gray-600">{{ scenario.description }}</p>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { useFetchJson } from '@/composables/useFetchJson';

const { data, error, loading } = useFetchJson('/scenarios');
</script>
