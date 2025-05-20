<script setup>
import { ref, onMounted } from 'vue';

const isAuthenticated = ref(false);

onMounted(() => {
  isAuthenticated.value = !!localStorage.getItem('token');
});

function logout() {
  localStorage.removeItem('token');
  window.location.href = '/login'; // Redirection explicite vers /login
}

import { useRouter } from 'vue-router';
const router = useRouter();

function goHome() {
  router.push('/scenarios');
}

</script>

<template>
  <header class="flex justify-between items-center p-4 bg-white shadow">
    <h1 class="text-xl font-bold cursor-pointer hover:underline" @click="goHome">
      DecisionFlow
    </h1>


    <button v-if="isAuthenticated" @click="logout" class="text-sm text-red-600 hover:underline">
      Se déconnecter
    </button>
  </header>
</template>

<style scoped>
/* Style de base si besoin */
</style>
