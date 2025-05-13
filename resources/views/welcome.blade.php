@extends('layouts.vue')

@section('title', 'DecisionFlow - Simulateur de Prise de Décision')

@section('app')
    @vite(['resources/js/app.js', 'resources/css/app.css'])
@endsection

@section('content')
    <div class="flex flex-col min-h-screen">
        <!-- Header Laravel sera affiché ici via vue.blade.php -->
        
        <!-- Container principal Vue.js -->
        <main class="flex-1 flex items-center justify-center p-6 lg:p-8">
            <div id="app" class="w-full max-w-4xl mx-auto">
                <!-- Loading state le temps que Vue s'initialise -->
                <div v-cloak class="text-center py-12">
                    <svg class="animate-spin h-8 w-8 mx-auto text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">Chargement de l'application...</p>
                </div>
            </div>
        </main>
    </div>
@endsection