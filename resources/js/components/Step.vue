<template>
  <div class="p-4">
    <h2 class="text-2xl font-bold mb-4">Étape</h2>

    <div v-if="loading">Chargement...</div>
    <div v-else-if="error" class="text-red-600">Erreur : {{ error.statusText || error }}</div>
    <div v-else-if="!step">Aucune donnée reçue.</div>

    <div v-else>
      <p class="mb-4 text-lg">{{ step.content }}</p>

      <ul v-if="step.options && step.options.length" class="space-y-2">
        <li v-for="option in step.options" :key="option.id">
          <button
            @click="goToNextStep(option.next_step_id)"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
          >
            {{ option.text }}
          </button>
        </li>
      </ul>

      <p v-else class="text-gray-500 mt-4">Fin du scénario.</p>
    </div>
  </div>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useFetchJson } from '@/composables/useFetchJson';

const route = useRoute();
const router = useRouter();

const step = ref(null);
const error = ref(null);
const loading = ref(true);

// Fonction pour charger une étape donnée
function loadStep(stepId) {
  console.debug('🔄 Chargement de l’étape', stepId);
  loading.value = true;
  const { data, error: err } = useFetchJson(`/steps/${stepId}`);
  watch(data, () => {
    step.value = data.value;
    loading.value = false;
    console.debug('✅ Étape reçue :', step.value);
  });
  watch(err, () => {
    error.value = err.value;
    loading.value = false;
    console.error('❌ Erreur lors du chargement de l’étape :', error.value);
  });
}

// Initial load
onMounted(() => {
  loadStep(route.params.stepId);
});

// Recharger quand l’ID de l’étape change dans l’URL
watch(() => route.params.stepId, (newStepId) => {
  loadStep(newStepId);
});

// Navigation vers la prochaine étape
function goToNextStep(nextStepId) {
  console.debug('➡️ Navigation vers step', nextStepId);
  router.push(`/scenarios/${route.params.id}/step/${nextStepId}`);
}
</script>