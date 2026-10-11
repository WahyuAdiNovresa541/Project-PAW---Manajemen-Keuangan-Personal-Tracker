<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions | Finance Tracker</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f6f8f6;
            color: #26352c;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 235px;
            background: #fff;
            padding: 30px 20px;
            border-right: 1px solid #e6ebe6;
            flex-shrink: 0;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            color: #26734d;
            margin-bottom: 40px;
        }

        .nav-label {
            font-size: 11px;
            color: #929b94;
            margin-bottom: 12px;
        }

        .nav a {
            display: block;
            padding: 13px 14px;
            margin-bottom: 7px;
            border-radius: 9px;
            text-decoration: none;
            color: #68736b;
            font-size: 14px;
        }

        .nav a.active {
            background: #e9f5ed;
            color: #26734d;
            font-weight: bold;
        }

        .main {
            flex: 1;
            padding: 35px;
            min-width: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #858e87;
            font-size: 14px;
        }

        .button {
            display: inline-block;
            background: #26734d;
            color: white;
            text-decoration: none;
            padding: 12px 17px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .panel {
            background: white;
            border: 1px solid #e7ebe7;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .summary-card {
            background: white;
            border: 1px solid #e7ebe7;
            border-radius: 14px;
            padding: 21px;
        }

        .summary-card p {
            font-size: 13px;
            color: #858e87;
            margin-bottom: 13px;
        }

        .summary-card h2 {
            font-size: 22px;
        }

        .income {
            color: #238451;
        }

        .expense {
            color: #d45e55;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        input, select {
            padding: 11px 13px;
            border: 1px solid #dfe5df;
            border-radius: 8px;
            background: white;
            color: #344239;
            font-size: 13px;
        }

        input {
            flex: 1;
            min-width: 180px;
        }

        select {
            min-width: 150px;
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .table-heading h2 {
            font-size: 17px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            white-space: nowrap;
        }

        th {
            font-size: 12px;
            color: #929b94;
            font-weight: normal;
            padding: 14px 12px;
            border-bottom: 1px solid #edf0ed;
        }

        td {
            font-size: 13px;
            padding: 17px 12px;
            border-bottom: 1px solid #f0f2f0;
        }

        .category {
            display: inline-block;
            background: #f0f3f0;
            padding: 6px 10px;
            border-radius: 6px;
            color: #637066;
            font-size: 12px;
        }

        .type {
            font-size: 12px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #929b94;
            display: none;
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 190px;
                padding: 25px 13px;
            }

            .main {
                padding: 24px 18px;
            }

            .summary {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                padding: 18px;
                border-right: none;
                border-bottom: 1px solid #e6ebe6;
            }

            .brand {
                margin-bottom: 18px;
            }

            .nav-label {
                display: none;
            }

            .nav {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }

            .nav a {
                margin: 0;
                padding: 10px;
            }

            .main {
                padding: 22px 14px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">Finance Tracker</div>

        <div class="nav-label">MAIN MENU</div>
        <nav class="nav">
            <a href="{{ url('/') }}">Dashboard</a>
            <a href="{{ url('/transactions') }}" class="active">Transactions</a>
            <a href="{{ url('/transactions/create') }}">Add Transaction</a>
        </nav>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>Transactions</h1>
                <p class="subtitle">Manage and review your income and expenses.</p>
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
            <h2 style="font-size:17px;">Find a transaction</h2>

            <div class="filters">
                <input
                    type="text"
                    id="search"
                    placeholder="Search transaction or category..."
                    aria-label="Search transactions"
                >

                <select id="type-filter" aria-label="Filter transaction type">
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
                    No matching transactions found.
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    const searchInput = document.getElementById('search');
    const typeFilter = document.getElementById('type-filter');
    const rows = Array.from(document.querySelectorAll('#transaction-list tr'));
    const emptyState = document.getElementById('empty-state');
    const resultCount = document.getElementById('result-count');

    function filterTransactions() {
        const query = searchInput.value.toLowerCase().trim();
        const selectedType = typeFilter.value;
        let visibleCount = 0;

        rows.forEach(function (row) {
            const matchesSearch = row.textContent.toLowerCase().includes(query);
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
