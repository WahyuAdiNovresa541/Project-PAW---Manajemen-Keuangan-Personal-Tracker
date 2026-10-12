<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageTitle }} - {{ config('app.name', 'Personal Finance Tracker') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <header class="bg-white shadow-sm">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
            <a class="font-bold text-indigo-700" href="{{ route('dashboard') }}">Personal Finance Tracker</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium hover:bg-slate-50" type="submit">
                    Keluar
                </button>
            </form>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-6 py-10">
        <h1 class="text-3xl font-bold">{{ $pageTitle }}</h1>
        <p class="mt-2 text-slate-600">Selamat datang, {{ auth()->user()->name }}.</p>
    </main>
</body>
</html>
