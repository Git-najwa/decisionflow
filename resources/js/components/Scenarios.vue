<template>
  <div class="p-4">
    <h2 class="text-xl font-bold mb-4">Liste des scénarios</h2>

    <div v-if="loading">Chargement...</div>
    <div v-else-if="error" class="text-red-600">Erreur : {{ error.statusText || error }}</div>

    <ul v-if="Array.isArray(data)" class="mt-4 space-y-2">
      <li v-for="scenario in data" :key="scenario.id" class="p-3 border rounded bg-white">
        <h3 class="font-semibold text-lg">{{ scenario.title }}</h3>
        <p v-if="scenario.description" class="text-sm text-gray-600">{{ scenario.description }}</p>

        <RouterLink
          v-if="scenario.steps"
          :to="{
            name: 'step',
            params: {
              id: scenario.id,
              stepId: getStartStepId(scenario.steps)
            }
          }"
          class="text-blue-600 hover:underline mt-2 inline-block"
        >
          Démarrer
        </RouterLink>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { useFetchJson } from '@/composables/useFetchJson';

const { data, error, loading } = useFetchJson('/scenarios');

function getStartStepId(steps) {
  const start = steps.find(step => step.is_start === 1)
  return start?.id || null;
}
</script>