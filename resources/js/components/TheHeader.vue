<script setup>
import { ref, onMounted } from 'vue';

const isAuthenticated = ref(false);

onMounted(() => {
  isAuthenticated.value = !!localStorage.getItem('token');
});

function logout() {
  localStorage.removeItem('token');
  window.location.reload(); // recharge l’app → retour au login
}
</script>

<template>
  <header class="flex justify-between items-center p-4 bg-white shadow">
    <h1 class="text-xl font-bold">DecisionFlow</h1>
    
    <button
      v-if="isAuthenticated"
      @click="logout"
      class="text-sm text-red-600 hover:underline"
    >
      Se déconnecter
    </button>
  </header>
</template>

<style scoped>
/* Style de base si besoin */
</style>
