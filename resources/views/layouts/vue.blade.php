<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DecisionFlow</title>

    {{-- Métas utiles pour fetchJson.js --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-base-url" content="{{ url('/api') }}">

    {{-- Assets générés par Vite --}}
    @vite('resources/js/app.js')
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
    <div id="app"></div>
</body>
</html>