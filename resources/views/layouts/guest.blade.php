<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-900 antialiased bg-gradient-to-br from-slate-50 via-white to-slate-50">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Header with Logo -->
            <div class="mb-8">
                <a href="/" class="flex items-center gap-3">
                    <x-application-logo class="w-12 h-12 fill-current text-primary-600" />
                    <span class="text-2xl font-bold text-primary-700">CodeQuest</span>
                </a>
            </div>

            <!-- Main Content Card -->
            <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-lg border border-slate-200 overflow-hidden rounded-xl">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="mt-8 text-center text-sm text-slate-600">
                <p>© {{ date('Y') }} CodeQuest — ISUFST Dingle Campus</p>
            </div>
        </div>
    </body>
</html>
