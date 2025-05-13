<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Meta critiques pour l'API -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-base-url" content="{{ url('api/v1') }}">
    
    <title>@yield('title', 'DecisionFlow')</title>
    
    <!-- Assets Vite -->
    @yield('app') {{-- Injection des assets CSS/JS --}}
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <!-- Header Laravel (login/register) -->
    @if (Route::has('login'))
    <header class="w-full lg:max-w-4xl mx-auto px-6 pt-6">
        <nav class="flex items-center justify-end gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-secondary">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-ghost">
                    Connexion
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-secondary">
                        Inscription
                    </a>
                @endif
            @endauth
        </nav>
    </header>
    @endif

    <!-- Conteneur principal pour Vue.js -->
    <div id="app">
        @yield('content') {{-- Le contenu de l'app Vue --}}
    </div>

    <!-- Styles spécifiques au header -->
    <style>
        .btn-ghost {
            @apply px-5 py-1.5 text-gray-800 dark:text-gray-200 border border-transparent hover:border-gray-300 dark:hover:border-gray-600 rounded-sm text-sm;
        }
        .btn-secondary {
            @apply px-5 py-1.5 bg-gray-800 dark:bg-gray-200 text-white dark:text-gray-800 border border-gray-800 dark:border-gray-200 hover:bg-gray-700 dark:hover:bg-gray-300 rounded-sm text-sm;
        }
    </style>
</body>
</html>