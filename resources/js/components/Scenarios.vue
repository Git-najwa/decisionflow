<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">Liste des scénarios</h2>

    <div v-if="loading">Chargement...</div>
    <div v-else-if="error" class="text-red-600">Erreur : {{ error.statusText || error }}</div>

    <ul v-if="Array.isArray(data)" class="mt-4 space-y-2">
      <li v-for="scenario in data" :key="scenario.id">
        <router-link
          :to="`/scenarios/${scenario.id}/step/${findStartStepId(scenario)}`"
          @click="saveScenarioId(scenario.id)"
          class="block p-4 border rounded bg-white hover:bg-gray-100"
        >
          <h3 class="font-semibold text-lg">{{ scenario.title }}</h3>
          <p v-if="scenario.description" class="text-sm text-gray-600">{{ scenario.description }}</p>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { useFetchJson } from '@/composables/useFetchJson';

const { data, error, loading } = useFetchJson('/scenarios');

function saveScenarioId(id) {
  localStorage.setItem('selectedScenarioId', id);
}

function findStartStepId(scenario) {
  const start = scenario.steps?.find(s => s.is_start);
  return start ? start.id : '';
}
</script>