<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $pemasukan = Transaction::where('type', 'income')->sum('amount');
        $pengeluaran = Transaction::where('type', 'expense')->sum('amount');
        $saldo = $pemasukan - $pengeluaran;

        $recentTransactions = Transaction::latest('date')->take(4)->get();

        $dashboard = [
            'saldo' => $saldo,
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran,
        ];

        return view('welcome', compact('dashboard', 'recentTransactions'));
    }
}