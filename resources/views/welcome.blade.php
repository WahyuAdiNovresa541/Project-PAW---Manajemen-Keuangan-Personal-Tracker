
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
            justify-content: flex-start;
            gap: 10px;
            width: 100%;
            margin: 0 0 34px;
            font-size: 22px;
            line-height: 1.2;
            font-weight: 700;
            color: var(--text);
            white-space: nowrap;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            min-width: 40px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: #FFFFFF;
            border-radius: 10px;
            font-size: 22px;
            line-height: 1;
            font-weight: 700;
        }

        .menu-label {
            display: block;
            margin: 0 0 12px 4px;
            padding: 0;
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.6;
            font-weight: 700;
            letter-spacing: 1px;
            overflow-wrap: break-word;
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
            margin: 0;
            border-radius: 9px;
            font-size: 14px;
            transition: background 0.2s, color 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
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
            min-width: 0;
            padding: 30px 36px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
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
            justify-content: flex-end;
            gap: 12px;
            margin-left: auto;
            flex-shrink: 0;
        }

        @media (max-width: 700px) {
            .topbar-actions {
                gap: 8px;
            }

            .logout-button {
                padding: 8px 10px;
            }
        }

        .logout-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--surface);
            color: var(--expense);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: background 0.2s;
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
            gap: 20px;
            margin-bottom: 24px;
            box-shadow: 0 10px 25px #155E7518;
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
            overflow-wrap: anywhere;
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
            flex-shrink: 0;
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
            min-width: 0;
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
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
            flex-shrink: 0;
        }

        .income-icon {
            background: var(--income-light);
            color: var(--income);
        }

        .expense-icon {
            background: var(--expense-light);
            color: var(--expense);
        }

        .saving-icon {
            background: var(--primary-light);
            color: var(--primary);
        }

        .summary-amount {
            font-size: clamp(17px, 2vw, 23px);
            font-weight: 700;
            overflow-wrap: anywhere;
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
            align-items: start;
        }

        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 23px;
            min-width: 0;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .panel-header h2 {
            font-size: 16px;
        }

        .text-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .text-link:hover {
            text-decoration: underline;
        }

        /* Simple cash flow chart */
        .chart {
            height: 190px;
            display: flex;
            align-items: end;
            justify-content: space-around;
            gap: 12px;
            padding: 15px 0 0;
            border-bottom: 1px solid var(--border);
            background: repeating-linear-gradient(
                to bottom,
                transparent 0,
                transparent 46px,
                #EDF3F5 47px,
                transparent 48px
            );
        }

        .chart-group {
            height: 100%;
            display: flex;
            align-items: end;
            gap: 5px;
            position: relative;
        }

        .bar {
            width: 13px;
            border-radius: 5px 5px 0 0;
        }

        .bar.income {
            background: #16805D;
        }

        .bar.expense {
            background: #E7A18A;
        }

        .chart-labels {
            display: flex;
            justify-content: space-around;
            color: var(--text-muted);
            font-size: 11px;
            margin-top: 12px;
        }

        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            color: var(--text-muted);
            font-size: 11px;
            margin-top: 20px;
        }

        .legend span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        /* Recent transactions */
        .transaction-list {
            display: flex;
            flex-direction: column;
        }

        .transaction {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 14px 0;
            border-bottom: 1px solid #EDF3F5;
        }

        .transaction:last-child {
            border-bottom: none;
        }

        .transaction-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: var(--background);
            font-size: 18px;
            flex-shrink: 0;
        }

        .transaction-info {
            flex: 1;
            min-width: 0;
        }

        .transaction-name {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .transaction-date {
            color: #8999A0;
            font-size: 10px;
        }

        .transaction-amount {
            font-size: 12px;
            font-weight: 700;
            text-align: right;
            white-space: nowrap;
        }

        .positive {
            color: var(--income);
        }

        .negative {
            color: var(--expense);
        }

        .demo-note {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 22px;
            text-align: center;
        }

        /* Tablet */
        @media (max-width: 1050px) {
            .sidebar {
                width: 205px;
            }

            .main {
                padding: 25px 22px;
            }

            .summary-grid {
                gap: 10px;
            }

            .summary-card {
                padding: 16px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Mobile */
        @media (max-width: 700px) {
            .app {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 15px 20px;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                margin: 0 0 15px;
            }

            .menu-label,
            .sidebar-note {
                display: none;
            }

            .sidebar nav {
                display: flex;
                flex-direction: row;
                gap: 5px;
                overflow-x: auto;
            }

            .nav-link {
                min-height: 40px;
                white-space: nowrap;
                padding: 10px;
                margin: 0;
            }

            .main {
                padding: 24px 16px;
            }

            .topbar {
                align-items: flex-start;
            }

            .profile {
                padding: 6px;
            }

            .profile-name {
                display: none;
            }

            .summary-grid {
                grid-template-columns: 1fr;
            }

            .balance-card {
                padding: 22px;
            }

            .panel {
                padding: 17px;
            }

            h1 {
                font-size: 23px;
            }
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
            <a href="{{ url('/') }}" class="nav-link active" aria-current="page">
                Dashboard
            </a>
            <a href="{{ url('/transactions') }}" class="nav-link">
                Transactions
            </a>
            <a href="{{ url('/transactions/create') }}" class="nav-link">
                Add Transaction
            </a>
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

                <a href="{{ url('/login') }}" class="logout-button">
                    Logout
                </a>
            </div>
        </header>

        <section class="balance-card">
            <div>
                <p class="balance-label">Total Saldo</p>
                <h2 class="balance-amount">Rp 5.250.000</h2>
                <p class="balance-caption">Ringkasan saldo dari data contoh</p>
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
                <h3 class="summary-amount">Rp 7.500.000</h3>
                <p class="summary-caption">Bulan ini · Data contoh</p>
            </article>

            <article class="summary-card">
                <div class="summary-top">
                    <p class="summary-label">Total Pengeluaran</p>
                    <span class="summary-icon expense-icon">↗</span>
                </div>
                <h3 class="summary-amount">Rp 2.250.000</h3>
                <p class="summary-caption">Bulan ini · Data contoh</p>
            </article>

            <article class="summary-card">
                <div class="summary-top">
                    <p class="summary-label">Sisa Dana</p>
                    <span class="summary-icon saving-icon">◷</span>
                </div>
                <h3 class="summary-amount">Rp 5.250.000</h3>
                <p class="summary-caption">Pemasukan dikurangi pengeluaran</p>
            </article>
        </section>

        <section class="content-grid">
            <article class="panel">
                <div class="panel-header">
                    <h2>Arus Kas</h2>
                    <span class="summary-label">6 bulan terakhir</span>
                </div>

                <div class="chart">
                    <div class="chart-group">
                        <div class="bar income" style="height: 65%"></div>
                        <div class="bar expense" style="height: 35%"></div>
                    </div>
                    <div class="chart-group">
                        <div class="bar income" style="height: 80%"></div>
                        <div class="bar expense" style="height: 42%"></div>
                    </div>
                    <div class="chart-group">
                        <div class="bar income" style="height: 55%"></div>
                        <div class="bar expense" style="height: 30%"></div>
                    </div>
                    <div class="chart-group">
                        <div class="bar income" style="height: 90%"></div>
                        <div class="bar expense" style="height: 48%"></div>
                    </div>
                    <div class="chart-group">
                        <div class="bar income" style="height: 72%"></div>
                        <div class="bar expense" style="height: 38%"></div>
                    </div>
                    <div class="chart-group">
                        <div class="bar income" style="height: 85%"></div>
                        <div class="bar expense" style="height: 45%"></div>
                    </div>
                </div>

                <div class="chart-labels">
                    <span>Mei</span>
                    <span>Jun</span>
                    <span>Jul</span>
                    <span>Agu</span>
                    <span>Sep</span>
                    <span>Okt</span>
                </div>

                <div class="legend">
                    <span><i class="dot" style="background:#16805D"></i>Pemasukan</span>
                    <span><i class="dot" style="background:#E7A18A"></i>Pengeluaran</span>
                </div>
            </article>

            <article class="panel">
                <div class="panel-header">
                    <h2>Transaksi Terbaru</h2>
                    <a href="{{ url('/transactions') }}" class="text-link">Lihat semua →</a>
                </div>

                <div class="transaction-list">
                    <div class="transaction">
                        <div class="transaction-icon">💼</div>
                        <div class="transaction-info">
                            <p class="transaction-name">Gaji Bulanan</p>
                            <p class="transaction-date">01 Okt 2026 · Pemasukan</p>
                        </div>
                        <p class="transaction-amount positive">+Rp5.000.000</p>
                    </div>

                    <div class="transaction">
                        <div class="transaction-icon">🍜</div>
                        <div class="transaction-info">
                            <p class="transaction-name">Makan &amp; Minum</p>
                            <p class="transaction-date">03 Okt 2026 · Pengeluaran</p>
                        </div>
                        <p class="transaction-amount negative">-Rp75.000</p>
                    </div>

                    <div class="transaction">
                        <div class="transaction-icon">🚗</div>
                        <div class="transaction-info">
                            <p class="transaction-name">Transportasi</p>
                            <p class="transaction-date">05 Okt 2026 · Pengeluaran</p>
                        </div>
                        <p class="transaction-amount negative">-Rp50.000</p>
                    </div>

                    <div class="transaction">
                        <div class="transaction-icon">📚</div>
                        <div class="transaction-info">
                            <p class="transaction-name">Buku Kuliah</p>
                            <p class="transaction-date">07 Okt 2026 · Pengeluaran</p>
                        </div>
                        <p class="transaction-amount negative">-Rp125.000</p>
                    </div>
                </div>
            </article>
        </section>

        <p class="demo-note">
            FinTrack · Tampilan demonstrasi menggunakan data dummy, belum terhubung ke database.
        </p>
    </main>
</div>
</body>
</html>
