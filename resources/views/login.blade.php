<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - {{ config('app.name', 'Personal Finance Tracker') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <main class="mx-auto flex min-h-screen max-w-md items-center px-6 py-12">
        <section class="w-full rounded-2xl bg-white p-8 shadow-lg">
            <p class="text-sm font-semibold uppercase tracking-wide text-indigo-600">Personal Finance Tracker</p>
            <h1 class="mt-2 text-3xl font-bold">Masuk ke akun</h1>
            <p class="mt-2 text-slate-600">Kelola keuangan pribadi Anda dengan lebih mudah.</p>

            <form class="mt-8 space-y-5" data-login-form method="POST" action="{{ route('login.authenticate') }}" novalidate>
                @csrf

                <div>
                    <label class="mb-1 block text-sm font-medium" for="email">Email</label>
                    <input
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="username"
                        inputmode="email"
                        required
                        aria-describedby="email-error"
                        aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                    >
                    <p class="mt-1 min-h-5 text-sm text-red-600" id="email-error" data-error-for="email" role="alert" aria-live="polite">@error('email'){{ $message }}@enderror</p>
                </div>

                <div>
                    <label class="mb-1 block text-sm font-medium" for="password">Password</label>
                    <input
                        class="w-full rounded-lg border border-slate-300 px-3 py-2 outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                        aria-describedby="password-error"
                        aria-invalid="{{ $errors->has('password') ? 'true' : 'false' }}"
                    >
                    <p class="mt-1 min-h-5 text-sm text-red-600" id="password-error" data-error-for="password" role="alert" aria-live="polite">@error('password'){{ $message }}@enderror</p>
                </div>

                <button class="w-full rounded-lg bg-indigo-600 px-4 py-2.5 font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" type="submit">
                    Masuk
                </button>
            </form>
        </section>
    </main>
</body>
</html>
