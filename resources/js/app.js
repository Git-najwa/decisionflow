import { createApp } from 'vue';
import { setDefaultHeaders, setDefaultBaseUrl } from '@/utils/fetchJson.js';
import App from './App.vue';

function configureHttpClient() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    // Définir les headers par défaut
    setDefaultHeaders({
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json',
        'Content-Type': 'application/json',
    });

    // Définir l'URL de base pour toutes les requêtes API
    setDefaultBaseUrl('/api');

    // Ajouter le token d'autorisation si présent
    const token = localStorage.getItem('token');
    if (token) {
        setDefaultHeaders({
            Authorization: `Bearer ${token}`,
        });
    }

    if (import.meta.env.DEV) {
        console.debug('[Config] CSRF Token:', csrfToken);
        console.debug('[Config] API Base URL:', '/api');
        console.debug('[Config] Authorization Token:', token);
    }
}

function initializeVueApp() {
    const app = createApp(App);

    try {
        app.mount('#app');
    } catch (error) {
        console.error('Échec du montage de Vue:', error);
        document.getElementById('app').innerHTML = `
            <div class="p-6 bg-red-50 text-red-700 rounded-lg">
                <h2 class="font-bold">Erreur d'initialisation</h2>
                <p>${error.message}</p>
                <button onclick="window.location.reload()" class="mt-4 px-4 py-2 bg-red-600 text-white rounded">
                    Recharger
                </button>
            </div>
        `;
    }
}

// Configurer le client HTTP et initialiser l'application Vue
configureHttpClient();
initializeVueApp();