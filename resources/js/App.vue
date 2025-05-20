<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <TheHeader />
    <router-view />
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import TheHeader from '@/components/TheHeader.vue';

onMounted(() => {
  const token = localStorage.getItem('token');
  if (!token && window.location.pathname !== '/login') {
    window.location.href = '/login'; // Redirection vers /login si non connecté
  }
});
</script>

<style scoped>
/* Add styles here if needed */
</style>