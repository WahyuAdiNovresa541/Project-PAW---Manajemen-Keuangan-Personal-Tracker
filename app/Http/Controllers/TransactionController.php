<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller {
    public function index() {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));
    }

    public function create() {
        return view('transaction.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'tanggal'   => 'required|date',
            'jenis'     => 'required|in:Pemasukan,Pengeluaran',
            'deskripsi' => 'required|string|max:100',
            'kategori'  => 'required|string|max:50',
            'jumlah'    => 'required|numeric|min:0',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function edit($id) {
        $transaction = Transaction::findOrFail($id);
        return view('transaction.edit', compact('transaction'));
    }

    public function update(Request $request, $id) {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'tanggal'   => 'required|date',
            'jenis'     => 'required|in:Pemasukan,Pengeluaran',
            'deskripsi' => 'required|string|max:100',
            'kategori'  => 'required|string|max:50',
            'jumlah'    => 'required|numeric|min:0',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui!');
    }

    public function destroy($id) {
        $transaction = Transaction::findOrFail($id);
        $transaction::delete();

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
