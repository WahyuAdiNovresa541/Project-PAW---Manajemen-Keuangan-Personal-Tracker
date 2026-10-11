
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction | FinTrack</title>

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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text);
        }

        button, input, select, textarea {
            font: inherit;
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

        
        .menu-label {
            display: block;
            margin: 0 0 12px 4px;
            padding: 0;
            font-size: 11px;
            line-height: 1.6;
            font-weight: 700;
            letter-spacing: 1px;
            color: #71818A;
            overflow-wrap: break-word;
        }


        .menu {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: var(--text-muted);
            padding: 13px 14px;
            border-radius: 9px;
            font-size: 14px;
            transition: background 0.2s, color 0.2s;
        }

        .menu a:hover {
            background: #F0F7F9;
            color: var(--primary);
        }

        .menu a.active {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
        }

        /* Main content */
        .main {
            flex: 1;
            min-width: 0;
            padding: 38px;
        }

        .content {
            max-width: 900px;
            margin: 0 auto;
        }

        .breadcrumb {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 17px;
        }

        h1 {
            font-size: 29px;
            letter-spacing: -0.7px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 5px 22px rgba(21, 94, 117, 0.045);
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .section-description {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 22px;
            line-height: 1.6;
        }

        /* Income and expense selector */
        .transaction-type {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 30px;
        }

        .type-option {
            padding: 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .type-option:hover {
            border-color: var(--primary);
        }

        .type-option.active[data-type="expense"] {
            background: var(--expense-light);
            color: var(--expense);
            border-color: #E9AAAA;
        }

        .type-option.active[data-type="income"] {
            background: var(--income-light);
            color: var(--income);
            border-color: #9BD6BA;
        }

        /* Form fields */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 700;
            color: var(--text);
        }

        .field-hint {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: #FFFFFF;
            color: var(--text);
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input::placeholder,
        textarea::placeholder {
            color: #A0ADB3;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(21, 94, 117, 0.10);
        }

        textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.6;
        }

        .amount-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid var(--border);
            border-radius: 9px;
            overflow: hidden;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .amount-wrapper:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(21, 94, 117, 0.10);
        }

        .amount-prefix {
            padding: 13px 15px;
            background: #F0F6F8;
            color: var(--primary);
            font-size: 14px;
            font-weight: 700;
            border-right: 1px solid var(--border);
        }

        .amount-wrapper input {
            border: none;
            border-radius: 0;
            box-shadow: none;
            min-width: 0;
        }

        .amount-wrapper input:focus {
            box-shadow: none;
        }

        /* Form actions */
        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #EDF2F4;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            border: 1px solid transparent;
            transition: background 0.2s, border-color 0.2s;
        }

        .btn-cancel {
            background: white;
            border-color: var(--border);
            color: var(--text-muted);
        }

        .btn-cancel:hover {
            background: #F4F8FA;
            border-color: #C5D4DA;
        }

        .btn-save {
            background: var(--primary);
            color: white;
        }

        .btn-save:hover {
            background: var(--primary-dark);
        }

        .btn:focus-visible,
        .type-option:focus-visible {
            outline: 3px solid rgba(21, 94, 117, 0.25);
            outline-offset: 2px;
        }

        /* Responsive layout */
        @media (max-width: 900px) {
            .sidebar {
                width: 215px;
                padding: 25px 15px;
            }

            .main {
                padding: 28px 22px;
            }

            .form-card {
                padding: 24px;
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
                font-size: 21px;
                margin-bottom: 17px;
            }

            .menu-label {
                display: none;
            }

            .menu {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 6px;
            }

            .menu a {
                flex: 1 1 auto;
                text-align: center;
                padding: 11px 10px;
                font-size: 13px;
            }

            .main {
                padding: 25px 16px;
            }

            h1 {
                font-size: 25px;
            }

            .form-card {
                padding: 20px 16px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 19px;
            }

            .full-width {
                grid-column: auto;
            }

            .transaction-type {
                gap: 8px;
            }

            .type-option {
                padding: 12px 8px;
                font-size: 13px;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
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

            <p class="menu-label">MENU UTAMA</p>

            <nav class="menu" aria-label="Navigasi utama">
                <a href="{{ url('/') }}">Dashboard</a>
                <a href="{{ url('/transactions') }}">Transactions</a>
                <a href="{{ url('/transactions/create') }}"
                class="active"
                aria-current="page">
                    Add Transaction
                </a>
            </nav>
        </aside>

        <main class="main">
            <div class="content">

                <div class="breadcrumb">
                    Transactions / Add Transaction
                </div>

                <h1>Add Transaction</h1>
                <p class="subtitle">
                    Catat pemasukan dan pengeluaran untuk memantau kondisi keuanganmu.
                </p>

                <section class="form-card">
                    <h2 class="section-title">Transaction Details</h2>
                    <p class="section-description">
                        Lengkapi informasi transaksi di bawah ini.
                    </p>

                    <form id="transactionForm">

                        <div class="transaction-type" aria-label="Jenis transaksi">
                            <button
                                type="button"
                                class="type-option active"
                                data-type="expense"
                                aria-pressed="true">
                                Pengeluaran
                            </button>

                            <button
                                type="button"
                                class="type-option"
                                data-type="income"
                                aria-pressed="false">
                                Pemasukan
                            </button>
                        </div>

                        <input type="hidden" id="type" name="type" value="expense">

                        <div class="form-grid">

                            <div class="form-group full-width">
                                <label for="name">Nama Transaksi</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Contoh: Makan siang"
                                    maxlength="100"
                                    autocomplete="off"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="amount">Nominal</label>
                                <div class="amount-wrapper">
                                    <span class="amount-prefix">Rp</span>
                                    <input
                                        type="number"
                                        id="amount"
                                        name="amount"
                                        placeholder="0"
                                        min="1"
                                        step="1"
                                        inputmode="numeric"
                                        required>
                                </div>
                                <span class="field-hint">
                                    Masukkan jumlah tanpa tanda titik atau koma.
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select id="category" name="category" required>
                                    <option value="">Pilih kategori</option>
                                    <option value="Food & Drink">Makanan & Minuman</option>
                                    <option value="Transport">Transportasi</option>
                                    <option value="Shopping">Belanja</option>
                                    <option value="Bills">Tagihan</option>
                                    <option value="Salary">Gaji</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Other">Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input
                                    type="date"
                                    id="date"
                                    name="date"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="payment">Metode Pembayaran</label>
                                <select id="payment" name="payment" required>
                                    <option value="">Pilih metode</option>
                                    <option value="Cash">Tunai</option>
                                    <option value="Bank Transfer">Transfer Bank</option>
                                    <option value="E-Wallet">E-Wallet</option>
                                    <option value="Debit Card">Kartu Debit</option>
                                </select>
                            </div>

                            <div class="form-group full-width">
                                <label for="notes">Catatan (Opsional)</label>
                                <textarea
                                    id="notes"
                                    name="notes"
                                    maxlength="500"
                                    placeholder="Tambahkan catatan transaksi..."></textarea>
                            </div>

                        </div>

                        <div class="actions">
                            <a href="{{ url('/transactions') }}" class="btn btn-cancel">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-save">
                                Simpan Transaksi
                            </button>
                        </div>

                    </form>
                </section>

            </div>
        </main>
    </div>

    <script>
        const typeButtons = document.querySelectorAll('.type-option');
        const typeInput = document.getElementById('type');
        const transactionForm = document.getElementById('transactionForm');
        const dateInput = document.getElementById('date');

        // Pilih jenis pemasukan atau pengeluaran.
        typeButtons.forEach(button => {
            button.addEventListener('click', () => {
                typeButtons.forEach(item => {
                    item.classList.remove('active');
                    item.setAttribute('aria-pressed', 'false');
                });

                button.classList.add('active');
                button.setAttribute('aria-pressed', 'true');
                typeInput.value = button.dataset.type;
            });
        });

        // Gunakan tanggal lokal hari ini tanpa bergantung pada format browser.
        const now = new Date();
        const localToday = [
            now.getFullYear(),
            String(now.getMonth() + 1).padStart(2, '0'),
            String(now.getDate()).padStart(2, '0')
        ].join('-');

        dateInput.value = localToday;

        // Sementara, tampilkan konfirmasi karena backend belum terintegrasi.
        transactionForm.addEventListener('submit', function(event) {
            event.preventDefault();

            if (!transactionForm.checkValidity()) {
                transactionForm.reportValidity();
                return;
            }

            alert(
                'Form berhasil diisi! Penyimpanan ke database akan ditambahkan ' +
                'setelah integrasi dengan backend.'
            );
        });
    </script>
</body>
</html>
