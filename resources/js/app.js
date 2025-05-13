import { createApp } from 'vue';
import { setDefaultHeaders, setDefaultBaseUrl } from '@/utils/fetchJson.js';
import App from './App.vue';

// Configuration Axios globale
function configureHttpClient() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
    const apiBaseUrl = document.querySelector('meta[name="api-base-url"]')?.content || '';
    
    setDefaultHeaders({
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    });
    
    setDefaultBaseUrl(apiBaseUrl);
    
    if (import.meta.env.DEV) {
        console.debug('[Config] CSRF Token:', csrfToken);
        console.debug('[Config] API Base URL:', apiBaseUrl);
    }
}

// Initialisation de l'app
function initializeVueApp() {
    const app = createApp(App);
    
    // Configuration globale
    app.config.globalProperties.$apiBaseUrl = import.meta.env.VITE_API_BASE_URL;
    
    // Mount avec gestion d'erreur
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

// Lancement
configureHttpClient();
initializeVueApp();