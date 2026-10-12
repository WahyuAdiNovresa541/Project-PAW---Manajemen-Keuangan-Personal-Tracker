<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());

@extends('layouts.app', ['pageTitle' => $pageTitle])

@section('content')
    <section class="w-full rounded-2xl bg-white p-8 shadow-lg">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold">{{ $pageTitle }}</h1>
                <p class="mt-2 text-slate-600">Selamat datang, {{ auth()->user()->name }}.</p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="rounded-lg bg-slate-800 px-4 py-2 font-semibold text-white hover:bg-slate-900" type="submit">
                    Logout
                </button>
            </form>
        </div>
    </section>
@endsection
