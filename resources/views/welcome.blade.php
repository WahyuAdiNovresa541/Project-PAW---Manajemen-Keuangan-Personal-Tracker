<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTrack - Personal Finance</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #155E75;
            --primary-dark: #164E63;
            --primary-light: #DDF3F7;
            --background: #F4F8FA;
            --surface: #FFFFFF;
            --text: #20343D;
            --text-muted: #71818A;
            --border: #DCE7EB;
            --income: #16805D;
            --income-light: #E5F5ED;
            --expense: #C24141;
            --expense-light: #FCEAEA;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 245px;
            background: var(--surface);
            border-right: 1px solid var(--border);
            padding: 28px 20px;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 34px;
            font-size: 22px;
            font-weight: 700;
            color: var(--text);
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

        .menu-label {
            display: block;
            margin: 0 0 12px 4px;
            color: var(--text-muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            min-height: 44px;
            text-decoration: none;
            color: #526873;
            padding: 11px 12px;
            border-radius: 9px;
            font-size: 14px;
            transition: 0.2s;
        }

        .nav-link:hover, .nav-link.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
        }

        .sidebar-note {
            margin-top: 42px;
            padding: 16px;
            background: var(--background);
            border-radius: 12px;
            font-size: 12px;
            line-height: 1.7;
            color: #526873;
        }

        .sidebar-note strong {
            display: block;
            margin-bottom: 4px;
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 30px 36px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .eyebrow {
            color: var(--text-muted);
            font-size: 11px;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        h1 {
            font-size: 27px;
            letter-spacing: -1px;
        }

        .date {
            color: var(--text-muted);
            font-size: 13px;
            margin-top: 8px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--surface);
            padding: 9px 13px;
            border: 1px solid var(--border);
            border-radius: 12px;
            font-size: 13px;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logout-button {
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--surface);
            color: var(--expense);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout-button:hover {
            background: var(--expense-light);
        }

        .avatar {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
        }

        /* Balance */
        .balance-card {
            background: linear-gradient(120deg, var(--primary-dark), #0E7490);
            color: #FFFFFF;
            border-radius: 18px;
            padding: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .balance-label {
            font-size: 13px;
            color: #D8EDF2;
            margin-bottom: 13px;
        }

        .balance-amount {
            font-size: clamp(27px, 3vw, 36px);
            font-weight: 700;
            letter-spacing: -1px;
        }

        .balance-caption {
            color: #D8EDF2;
            font-size: 12px;
            margin-top: 12px;
        }

        .balance-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: #FFFFFF20;
            display: grid;
            place-items: center;
            font-size: 27px;
        }

        /* Summary cards */
        .section-title {
            font-size: 17px;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .summary-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 21px;
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .summary-label {
            color: var(--text-muted);
            font-size: 13px;
        }

        .summary-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            font-size: 19px;
        }

        .income-icon { background: var(--income-light); color: var(--income); }
        .expense-icon { background: var(--expense-light); color: var(--expense); }
        .saving-icon { background: var(--primary-light); color: var(--primary); }

        .summary-amount {
            font-size: clamp(17px, 2vw, 23px);
            font-weight: 700;
        }

        .summary-caption {
            margin-top: 9px;
            color: #8999A0;
            font-size: 12px;
        }

        /* Dashboard panels */
        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(230px, 1fr);
            gap: 20px;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 23px;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .text-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .text-link:hover { text-decoration: underline; }

        /* Recent transactions */
        .transaction-list {
            display: flex;
            flex-direction: column;
        }

        .transaction {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 11px;
            padding: 14px 0;
            border-bottom: 1px solid #EDF3F5;
        }

        .transaction:last-child { border-bottom: none; }

        .transaction-info { flex: 1; }

        .transaction-name {
            font-size: 13px;
            font-weight: 600;
        }

        .transaction-amount {
            font-size: 13px;
            font-weight: 700;
        }

        .positive { color: var(--income); }
        .negative { color: var(--expense); }

        .demo-note {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 22px;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="app">

    <aside class="sidebar">
        <div class="brand">
            <span class="brand-icon">F</span>
            <span>FinTrack</span>
        </div>

        <p class="menu-label">MENU UTAMA</p>

        <nav aria-label="Navigasi utama">
            <a href="{{ route('dashboard') }}" class="nav-link active">Dashboard</a>
            <a href="{{ route('transactions.index') }}" class="nav-link">Transactions</a>
            <a href="{{ route('transactions.create') }}" class="nav-link">Add Transaction</a>
        </nav>

        <div class="sidebar-note">
            <strong>Kelola keuanganmu</strong>
            <p>Catat setiap pemasukan dan pengeluaran untuk mengatur keuangan dengan lebih baik.</p>
        </div>
    </aside>

    <main class="main">

        <header class="topbar">
            <div>
                <p class="eyebrow">PERSONAL FINANCE TRACKER</p>
                <h1>Dashboard</h1>
                <p class="date">Ringkasan kondisi keuanganmu hari ini.</p>
            </div>

            <div class="topbar-actions">
                <div class="profile">
                    <div class="avatar">U</div>
                    <span class="profile-name">User</span>
                </div>

                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </div>
        </header>

        <section class="balance-card">
            <div>
                <p class="balance-label">Total Saldo</p>
                <h2 class="balance-amount">
                    Rp {{ number_format($dashboard['saldo'] ?? 0, 0, ',', '.') }}
                </h2>
                <p class="balance-caption">Update realtime dari akumulasi transaksi</p>
            </div>
            <div class="balance-icon">▤</div>
        </section>

        <h2 class="section-title">Ringkasan Keuangan</h2>

        <section class="summary-grid">
            <article class="summary-card">
                <div class="summary-top">
                    <p class="summary-label">Total Pemasukan</p>
                    <span class="summary-icon income-icon">↙</span>
                </div>
                <h3 class="summary-amount">
                    Rp {{ number_format($dashboard['pemasukan'] ?? 0, 0, ',', '.') }}
                </h3>
                <p class="summary-caption">Total akumulasi pemasukan</p>
            </article>

            <article class="summary-card">
                <div class="summary-top">
                    <p class="summary-label">Total Pengeluaran</p>
                    <span class="summary-icon expense-icon">↗</span>
                </div>
                <h3 class="summary-amount">
                    Rp {{ number_format($dashboard['pengeluaran'] ?? 0, 0, ',', '.') }}
                </h3>
                <p class="summary-caption">Total akumulasi pengeluaran</p>
            </article>

            <article class="summary-card">
                <div class="summary-top">
                    <p class="summary-label">Sisa Dana</p>
                    <span class="summary-icon saving-icon">◷</span>
                </div>
                <h3 class="summary-amount">
                    Rp {{ number_format($dashboard['saldo'] ?? 0, 0, ',', '.') }}
                </h3>
                <p class="summary-caption">Pemasukan dikurangi pengeluaran</p>
            </article>
        </section>

        <section class="content-grid">
            <article class="panel">
                <div class="panel-header">
                    <h2>Informasi Keuangan</h2>
                </div>
                <p style="font-size: 13px; color: var(--text-muted); line-height: 1.6;">
                    Gunakan FinTrack secara rutin untuk mencatat riwayat transaksi harianmu. Semua perubahan pemasukan dan pengeluaran akan langsung dihitung pada kartu saldo di atas secara otomatis.
                </p>
            </article>

            <article class="panel">
                <div class="panel-header">
                    <h2>Transaksi Terbaru</h2>
                    <a href="{{ route('transactions.index') }}" class="text-link">Lihat semua →</a>
                </div>

                <div class="transaction-list">
                    @forelse($recentTransactions as $item)
                        @php
                            $isIncome = strtolower($item->type) === 'income';
                            $amountClass = $isIncome ? 'positive' : 'negative';
                            $sign = $isIncome ? '+' : '-';
                        @endphp
                        <div class="transaction">
                            <div class="transaction-info">
                                <p class="transaction-name">{{ $item->description }}</p>
                            </div>
                            <p class="transaction-amount {{ $amountClass }}">
                                {{ $sign }}Rp {{ number_format($item->amount, 0, ',', '.') }}
                            </p>
                        </div>
                    @empty
                        <p style="color: var(--text-muted); font-size: 13px; text-align: center; padding: 20px 0;">
                            Belum ada transaksi terbaru.
                        </p>
                    @endforelse
                </div>
            </article>
        </section>

        <p class="demo-note">FinTrack · Aplikasi Manajemen Keuangan Personal</p>
    </main>
</div>
</body>
</html>