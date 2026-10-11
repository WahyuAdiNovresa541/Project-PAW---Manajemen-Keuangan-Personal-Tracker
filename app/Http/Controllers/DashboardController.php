<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User; // Hapus komentar jika ingin menggunakan model

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman utama dashboard.
     */
    public function index()
    {
        // Contoh: Mengambil data dari database untuk ditampilkan di dashboard
        // $totalUsers = User::count();
        // $recentActivities = Activity::latest()->take(5)->get();

        $data = [
            'pageTitle' => 'Dashboard Utama',
            // 'totalUsers' => $totalUsers,
        ];

        // Mengembalikan view yang berada di resources/views/dashboard/index.blade.php
        return view('dashboard.index', $data);
    }
}