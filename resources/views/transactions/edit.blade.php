<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction | FinTrack</title>

    <style>
        :root {
            --primary: #155E75;
            --primary-dark: #164E63;
            --primary-light: #DDF3F7;
            --background: #F4F8FA;
            --surface: #FFFFFF;
            --text: #20343D;
            --text-muted: #71818A;
            --border: #DCE7EB;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text);
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            flex-shrink: 0;
            background: var(--surface);
            border-right: 1px solid var(--border);
            padding: 28px 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 34px;
            font-size: 22px;
            font-weight: 700;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: #FFFFFF;
            border-radius: 10px;
            font-size: 22px;
            font-weight: 700;
        }

        .nav-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--text-muted);
            margin-bottom: 12px;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav a {
            display: flex;
            align-items: center;
            min-height: 44px;
            padding: 12px 14px;
            border-radius: 9px;
            text-decoration: none;
            color: var(--text-muted);
            font-size: 14px;
            transition: 0.2s;
        }

        .nav a:hover {
            background: #F0F7F9;
            color: var(--primary);
        }

        .nav a.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
        }

        .main {
            flex: 1;
            padding: 35px;
        }

        .topbar {
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 25px;
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
            color: var(--text);
        }

        input, select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: var(--primary);
        }

        .btn-submit {
            background: var(--primary);
            color: #FFFFFF;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-submit:hover {
            background: var(--primary-dark);
        }

        .btn-cancel {
            display: inline-block;
            margin-left: 10px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
        }

        .btn-cancel:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">
            <span class="brand-icon">F</span>
            <span>FinTrack</span>
        </div>

        <p class="nav-label">MENU UTAMA</p>

        <nav class="nav">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('transactions.index') }}" class="active">Transactions</a>
            <a href="{{ route('transactions.create') }}">Add Transaction</a>
        </nav>
    </aside>

    <main class="main">
        <header class="topbar">
            <h1>Edit Transaction</h1>
            <p class="subtitle">Perbarui detail transaksi keuangan Anda.</p>
        </header>

        <section class="panel">
            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Judul / Deskripsi</label>
                    <input type="text" name="description" value="{{ old('description', $transaction->description) }}" required>
                </div>

                <div class="form-group">
                    <label>Nominal (Rp)</label>
                    <input type="number" name="amount" value="{{ old('amount', $transaction->amount) }}" required>
                </div>

                <div class="form-group">
                    <label>Tipe Transaksi</label>
                    <select name="type" required>
                        <option value="income" {{ strtolower($transaction->type) === 'income' ? 'selected' : '' }}>Income (Pemasukan)</option>
                        <option value="expense" {{ strtolower($transaction->type) === 'expense' ? 'selected' : '' }}>Expense (Pengeluaran)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $transaction->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="date" value="{{ \Carbon\Carbon::parse($transaction->date)->format('Y-m-d') }}" required>
                </div>

                <div>
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    <a href="{{ route('transactions.index') }}" class="btn-cancel">Batal</a>
                </div>
            </form>
        </section>
    </main>

</div>
</body>
</html>