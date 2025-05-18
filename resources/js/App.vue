<template>
  <div class="min-h-screen bg-gray-100 p-6">
    <TheHeader />
    <LoginForm v-if="!isAuthenticated" @logged-in="handleLogin" />
    <Scenarios v-else />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import LoginForm from '@/components/LoginForm.vue';
import Scenarios from '@/components/Scenarios.vue';
import TheHeader from '@/components/TheHeader.vue';

const isAuthenticated = ref(false);

onMounted(() => {
  const token = localStorage.getItem('token');
  if (token) isAuthenticated.value = true;
});

function handleLogin() {
  isAuthenticated.value = true;
}
</script>

<style scoped>
/* Add styles here if needed */
</style>