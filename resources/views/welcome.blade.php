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

        body {
            font-family: 'Inter', sans-serif;
            background: #f7f9f7;
            color: #202820;
        }

        .app {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 245px;
            background: #fff;
            border-right: 1px solid #e8ede8;
            padding: 28px 18px;
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 8px 42px;
            font-size: 21px;
            font-weight: 700;
        }

        .brand-icon {
            background: #18794e;
            color: white;
            border-radius: 10px;
            padding: 9px;
        }

        .menu-label {
            color: #929b92;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            margin: 25px 10px 12px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #667066;
            padding: 13px 12px;
            margin-bottom: 6px;
            border-radius: 9px;
            font-size: 14px;
            transition: .2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #eaf5ee;
            color: #18794e;
            font-weight: 600;
        }

        .sidebar-note {
            margin-top: 50px;
            padding: 16px;
            background: #f1f8f3;
            border-radius: 12px;
            font-size: 12px;
            line-height: 1.7;
            color: #526458;
        }

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
            color: #7d887e;
            font-size: 13px;
            margin-bottom: 8px;
        }

        h1 {
            font-size: 27px;
            letter-spacing: -1px;
        }

        .date {
            color: #727d73;
            font-size: 13px;
            margin-top: 8px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: white;
            padding: 9px 13px;
            border: 1px solid #e8ede8;
            border-radius: 12px;
            font-size: 13px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #dcefe2;
            color: #18794e;
            font-weight: 700;
        }

        .balance-card {
            background: linear-gradient(120deg, #176b46, #269461);
            color: white;
            border-radius: 18px;
            padding: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
            box-shadow: 0 10px 25px #176b4618;
        }

        .balance-label {
            font-size: 13px;
            color: #d9eee1;
            margin-bottom: 13px;
        }

        .balance-amount {
            font-size: clamp(27px, 3vw, 36px);
            font-weight: 700;
            letter-spacing: -1px;
        }

        .balance-caption {
            color: #d9eee1;
            font-size: 12px;
            margin-top: 12px;
        }

        .balance-icon {
            width: 58px;
            height: 58px;
            border-radius: 16px;
            background: #ffffff20;
            display: grid;
            place-items: center;
            font-size: 27px;
        }

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
            background: white;
            border: 1px solid #e9eee9;
            border-radius: 15px;
            padding: 21px;
        }

        .summary-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 20px;
        }

        .summary-label {
            color: #788278;
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

        .income-icon {
            background: #e7f6ec;
        }

        .expense-icon {
            background: #fff0e8;
        }

        .saving-icon {
            background: #edf0ff;
        }

        .summary-amount {
            font-size: clamp(17px, 2vw, 23px);
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .summary-caption {
            margin-top: 9px;
            color: #899289;
            font-size: 12px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(230px, 1fr);
            gap: 20px;
            align-items: start;
        }

        .panel {
            background: white;
            border: 1px solid #e9eee9;
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
            color: #18794e;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .chart {
            height: 190px;
            display: flex;
            align-items: end;
            justify-content: space-around;
            gap: 12px;
            padding: 15px 0 0;
            border-bottom: 1px solid #edf0ed;
            background: repeating-linear-gradient(
                to bottom,
                transparent 0,
                transparent 46px,
                #f0f3f0 47px,
                transparent 48px
            );
        }

        .chart-group {
            height: 100%;
            display: flex;
            align-items: end;
            gap: 5px;
            position: relative;
            padding-bottom: 0;
        }

        .bar {
            width: 13px;
            border-radius: 5px 5px 0 0;
        }

        .bar.income {
            background: #279966;
        }

        .bar.expense {
            background: #f0b58e;
        }

        .chart-labels {
            display: flex;
            justify-content: space-around;
            color: #8a948a;
            font-size: 11px;
            margin-top: 12px;
        }

        .legend {
            display: flex;
            gap: 15px;
            color: #788278;
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

        .transaction-list {
            display: flex;
            flex-direction: column;
        }

        .transaction {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 14px 0;
            border-bottom: 1px solid #f0f2f0;
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
            background: #f0f5f0;
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
            color: #929a92;
            font-size: 10px;
        }

        .transaction-amount {
            font-size: 12px;
            font-weight: 700;
            text-align: right;
            white-space: nowrap;
        }

        .positive {
            color: #218653;
        }

        .negative {
            color: #db7850;
        }

        .demo-note {
            font-size: 11px;
            color: #879087;
            margin-top: 22px;
            text-align: center;
        }

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

        @media (max-width: 700px) {
            .app {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 15px;
                border-right: none;
                border-bottom: 1px solid #e8ede8;
            }

            .brand {
                margin: 0 5px 15px;
            }

            .menu-label,
            .sidebar-note {
                display: none;
            }

            .sidebar nav {
                display: flex;
                gap: 5px;
                overflow-x: auto;
            }

            .nav-link {
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
            <span class="brand-icon">₿</span>
            <span>FinTrack</span>
        </div>

        <p class="menu-label">MENU UTAMA</p>

        <nav>
            <a href="{{ url('/') }}" class="nav-link active">▦ Dashboard</a>
            <a href="{{ url('/transactions') }}" class="nav-link">⇄ Transactions</a>
            <a href="{{ url('/transactions/create') }}" class="nav-link">＋ Add Transaction</a>
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

            <div class="profile">
                <div class="avatar">U</div>
                <span class="profile-name">User</span>
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
                    <span><i class="dot" style="background:#279966"></i>Pemasukan</span>
                    <span><i class="dot" style="background:#f0b58e"></i>Pengeluaran</span>
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
                            <p class="transaction-name">Makan & Minum</p>
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