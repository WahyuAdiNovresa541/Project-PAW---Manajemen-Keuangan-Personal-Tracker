
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions | FinTrack</title>

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
            --income: #16805D;
            --income-light: #E5F5ED;
            --expense: #C24141;
            --expense-light: #FCEAEA;
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

        /* Sidebar */
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
            justify-content: flex-start;
            gap: 10px;
            width: 100%;
            margin-bottom: 34px;
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

        .nav-label {
            display: block;
            margin: 0 0 12px 4px;
            padding: 0;
            font-size: 11px;
            line-height: 1.6;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--text-muted);
            overflow-wrap: break-word;
        }

        .nav {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .nav a {
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 44px;
            padding: 12px 14px;
            border-radius: 9px;
            text-decoration: none;
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.5;
            transition: background 0.2s, color 0.2s;
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

        /* Main content */
        .main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: var(--primary);
            color: #FFFFFF;
            text-decoration: none;
            padding: 12px 17px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
        }

        .button:hover {
            background: var(--primary-dark);
        }

        /* Summary cards */
        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .summary-card {
            min-width: 0;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 21px;
        }

        .summary-card p {
            font-size: 13px;
            line-height: 1.5;
            color: var(--text-muted);
            margin-bottom: 13px;
        }

        .summary-card h2 {
            font-size: 22px;
            line-height: 1.4;
            overflow-wrap: anywhere;
        }

        .income {
            color: var(--income);
        }

        .expense {
            color: var(--expense);
        }

        /* Panels and filters */
        .panel {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .panel-title {
            font-size: 17px;
            line-height: 1.5;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        input,
        select {
            min-height: 42px;
            padding: 11px 13px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface);
            color: var(--text);
            font-size: 13px;
            outline: none;
        }

        input {
            flex: 1;
            min-width: 180px;
        }

        select {
            min-width: 150px;
            cursor: pointer;
        }

        input:focus,
        select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(21, 94, 117, 0.10);
        }

        /* Transaction table */
        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .table-heading h2 {
            font-size: 17px;
        }

        .table-wrap {
            overflow-x: auto;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            white-space: nowrap;
        }

        th {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 700;
            padding: 14px 12px;
            border-bottom: 1px solid #EDF2F4;
        }

        td {
            font-size: 13px;
            padding: 17px 12px;
            border-bottom: 1px solid #F0F4F5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .category {
            display: inline-block;
            background: #F0F6F8;
            padding: 6px 10px;
            border-radius: 6px;
            color: #536A74;
            font-size: 12px;
        }

        .type {
            font-size: 12px;
            font-weight: 700;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: var(--text-muted);
            display: none;
            font-size: 14px;
        }

        .empty p {
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .empty .button {
            display: inline-flex;
        }

        /* Responsive layout */
        @media (max-width: 1000px) {
            .sidebar {
                width: 220px;
                padding: 28px 16px;
            }

            .main {
                padding: 28px 22px;
            }

            .summary {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                padding: 18px 20px;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                margin-bottom: 20px;
                font-size: 21px;
            }

            .brand-icon {
                width: 40px;
                height: 40px;
            }

            .nav-label {
                margin-bottom: 10px;
            }

            .nav {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 6px;
            }

            .nav a {
                flex: 1 1 auto;
                justify-content: center;
                width: auto;
                min-height: 40px;
                padding: 10px;
                text-align: center;
                font-size: 13px;
            }

            .main {
                padding: 24px 16px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
                gap: 16px;
            }

            h1 {
                font-size: 25px;
            }

            .button {
                width: 100%;
            }

            .summary {
                gap: 12px;
            }

            .summary-card {
                padding: 18px;
            }

            .summary-card h2 {
                font-size: 21px;
            }

            .panel {
                padding: 18px 14px;
            }

            .filters {
                flex-direction: column;
            }

            input,
            select {
                width: 100%;
                min-width: 0;
            }

            .table-heading {
                align-items: flex-start;
                flex-direction: column;
            }
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

        <nav class="nav" aria-label="Navigasi utama">
            <a href="{{ url('/') }}">Dashboard</a>
            <a href="{{ url('/transactions') }}"
               class="active"
               aria-current="page">
                Transactions
            </a>
            <a href="{{ url('/transactions/create') }}">Add Transaction</a>
        </nav>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>Transactions</h1>
                <p class="subtitle">
                    Manage and review your income and expenses.
                </p>
            </div>

            <a class="button" href="{{ url('/transactions/create') }}">
                + Add Transaction
            </a>
        </header>

        <section class="summary">
            <div class="summary-card">
                <p>Total Transactions</p>
                <h2 id="total-count">6</h2>
            </div>

            <div class="summary-card">
                <p>Total Income</p>
                <h2 class="income">Rp 8.500.000</h2>
            </div>

            <div class="summary-card">
                <p>Total Expenses</p>
                <h2 class="expense">Rp 3.250.000</h2>
            </div>
        </section>

        <section class="panel">
            <h2 class="panel-title">Find a transaction</h2>

            <div class="filters">
                <input
                    type="text"
                    id="search"
                    placeholder="Search transaction or category..."
                    aria-label="Cari transaksi"
                >

                <select id="type-filter" aria-label="Filter jenis transaksi">
                    <option value="all">All types</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
        </section>

        <section class="panel">
            <div class="table-heading">
                <h2>All Transactions</h2>
                <span class="subtitle" id="result-count">6 records</span>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>TRANSACTION</th>
                            <th>CATEGORY</th>
                            <th>DATE</th>
                            <th>TYPE</th>
                            <th>AMOUNT</th>
                        </tr>
                    </thead>

                    <tbody id="transaction-list">
                        <tr data-type="income">
                            <td>Monthly Salary</td>
                            <td><span class="category">Salary</span></td>
                            <td>10 Oct 2026</td>
                            <td><span class="type income">Income</span></td>
                            <td class="income">+ Rp 5.000.000</td>
                        </tr>

                        <tr data-type="expense">
                            <td>Lunch</td>
                            <td><span class="category">Food</span></td>
                            <td>10 Oct 2026</td>
                            <td><span class="type expense">Expense</span></td>
                            <td class="expense">- Rp 35.000</td>
                        </tr>

                        <tr data-type="expense">
                            <td>Internet Bill</td>
                            <td><span class="category">Bills</span></td>
                            <td>09 Oct 2026</td>
                            <td><span class="type expense">Expense</span></td>
                            <td class="expense">- Rp 250.000</td>
                        </tr>

                        <tr data-type="income">
                            <td>Freelance Project</td>
                            <td><span class="category">Freelance</span></td>
                            <td>08 Oct 2026</td>
                            <td><span class="type income">Income</span></td>
                            <td class="income">+ Rp 2.500.000</td>
                        </tr>

                        <tr data-type="expense">
                            <td>Transport</td>
                            <td><span class="category">Transport</span></td>
                            <td>07 Oct 2026</td>
                            <td><span class="type expense">Expense</span></td>
                            <td class="expense">- Rp 65.000</td>
                        </tr>

                        <tr data-type="income">
                            <td>Side Project</td>
                            <td><span class="category">Other Income</span></td>
                            <td>05 Oct 2026</td>
                            <td><span class="type income">Income</span></td>
                            <td class="income">+ Rp 1.000.000</td>
                        </tr>
                    </tbody>
                </table>

                <div id="empty-state" class="empty">
                    <p>No matching transactions found.</p>
                    <a class="button" href="{{ url('/transactions/create') }}">
                        + Add Transaction
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    const searchInput = document.getElementById('search');
    const typeFilter = document.getElementById('type-filter');
    const rows = Array.from(
        document.querySelectorAll('#transaction-list tr')
    );
    const emptyState = document.getElementById('empty-state');
    const resultCount = document.getElementById('result-count');
    const totalCount = document.getElementById('total-count');

    function filterTransactions() {
        const query = searchInput.value.toLowerCase().trim();
        const selectedType = typeFilter.value;
        let visibleCount = 0;

        rows.forEach(function (row) {
            const matchesSearch = row.textContent
                .toLowerCase()
                .includes(query);

            const matchesType = selectedType === 'all'
                || row.dataset.type === selectedType;

            const visible = matchesSearch && matchesType;

            row.style.display = visible ? '' : 'none';

            if (visible) {
                visibleCount++;
            }
        });

        resultCount.textContent = visibleCount + ' records';
        emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    searchInput.addEventListener('input', filterTransactions);
    typeFilter.addEventListener('change', filterTransactions);
</script>
</body>
</html>
