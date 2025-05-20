<template>
  <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <form @submit.prevent="handleLogin" class="space-y-4">
      <h2 class="text-2xl font-semibold mb-6">Connexion</h2>

      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input v-model="email" id="email" type="email" required
          class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input v-model="password" id="password" type="password" required
          class="w-full p-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <div v-if="error" class="text-red-600 text-sm">
        {{ error }}
      </div>

      <button type="submit"
        class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
        Se connecter
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const email = ref('');
const password = ref('');
const error = ref('');

const emit = defineEmits(['logged-in']);

async function handleLogin() {
  error.value = '';
  try {
    const response = await fetch('/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
      },
      body: JSON.stringify({
        email: email.value,
        password: password.value,
      }),
    });

    const data = await response.json();

    if (!response.ok) {
      error.value = data.message || 'Erreur lors de la connexion';
      return;
    }

    if (!data.token) {
      error.value = 'Token manquant dans la réponse';
      return;
    }

    localStorage.setItem('token', data.token);
    console.log('Token stocké dans localStorage :', data.token);

    // Redirection après succès
    router.push('/scenarios');
  } catch (err) {
    error.value = 'Erreur de connexion';
    console.error('Erreur lors du login :', err);
  }
}

</script>