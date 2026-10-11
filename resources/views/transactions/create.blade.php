<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction | FinTrack</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f7f9f7;
            color: #26372d;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #ffffff;
            border-right: 1px solid #e5ebe5;
            padding: 28px 20px;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            color: #246b45;
            margin-bottom: 40px;
        }

        .menu a {
            display: block;
            text-decoration: none;
            color: #66736a;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 9px;
        }

        .menu a:hover,
        .menu a.active {
            background: #e9f5ec;
            color: #246b45;
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 35px;
        }

        .breadcrumb {
            font-size: 13px;
            color: #89948c;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #7b867e;
            margin-bottom: 28px;
            line-height: 1.6;
        }

        .form-card {
            background: white;
            border: 1px solid #e6ece6;
            border-radius: 15px;
            padding: 30px;
            max-width: 850px;
            box-shadow: 0 4px 15px rgba(30, 70, 40, 0.04);
        }

        .transaction-type {
            display: flex;
            gap: 12px;
            margin-bottom: 28px;
        }

        .type-option {
            flex: 1;
            padding: 13px;
            border: 1px solid #dfe7df;
            border-radius: 9px;
            background: white;
            cursor: pointer;
            font-size: 14px;
        }

        .type-option.active {
            background: #e9f5ec;
            color: #246b45;
            border-color: #4c9567;
            font-weight: bold;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #dfe5df;
            border-radius: 8px;
            background: white;
            font-size: 14px;
            color: #26372d;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #4c9567;
            box-shadow: 0 0 0 3px rgba(76, 149, 103, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .amount-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #dfe5df;
            border-radius: 8px;
            overflow: hidden;
        }

        .amount-wrapper span {
            padding: 13px;
            background: #f5f8f5;
            color: #66736a;
        }

        .amount-wrapper input {
            border: none;
            border-radius: 0;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #edf0ed;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            border: none;
        }

        .btn-cancel {
            background: white;
            border: 1px solid #dfe5df;
            color: #56635a;
        }

        .btn-save {
            background: #287449;
            color: white;
        }

        .btn-save:hover {
            background: #1e5d38;
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 75px;
                padding: 20px 8px;
            }

            .logo {
                font-size: 12px;
                text-align: center;
            }

            .menu a {
                font-size: 11px;
                text-align: center;
                padding: 12px 3px;
            }

            .main {
                padding: 22px 15px;
            }

            .form-card {
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
    <div class="layout">

        <aside class="sidebar">
            <div class="logo">FinTrack</div>

            <nav class="menu">
                <a href="{{ url('/') }}">Dashboard</a>
                <a href="{{ url('/transactions') }}">Transactions</a>
                <a href="{{ url('/transactions/create') }}" class="active">
                    + Add Transaction
                </a>
            </nav>
        </aside>

        <main class="main">
            <div class="breadcrumb">
                Transactions / Add Transaction
            </div>

            <h1>Add Transaction</h1>
            <p class="subtitle">
                Catat pemasukan dan pengeluaran untuk memantau keuanganmu.
            </p>

            <section class="form-card">

                <form id="transactionForm">

                    <div class="transaction-type">
                        <button
                            type="button"
                            class="type-option active"
                            data-type="expense">
                            Pengeluaran
                        </button>

                        <button
                            type="button"
                            class="type-option"
                            data-type="income">
                            Pemasukan
                        </button>
                    </div>

                    <input type="hidden" id="type" value="expense">

                    <div class="form-grid">

                        <div class="form-group full-width">
                            <label for="name">Nama Transaksi</label>
                            <input
                                type="text"
                                id="name"
                                placeholder="Contoh: Makan siang"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="amount">Nominal</label>

                            <div class="amount-wrapper">
                                <span>Rp</span>
                                <input
                                    type="number"
                                    id="amount"
                                    placeholder="0"
                                    min="1"
                                    step="1"
                                    required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select id="category" required>
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
                                required>
                        </div>

                        <div class="form-group">
                            <label for="payment">Metode Pembayaran</label>
                            <select id="payment" required>
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
                                placeholder="Tambahkan catatan transaksi..."></textarea>
                        </div>

                    </div>

                    <div class="actions">
                        <a
                            href="{{ url('/transactions') }}"
                            class="btn btn-cancel">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-save">
                            Simpan Transaksi
                        </button>
                    </div>

                </form>
            </section>
        </main>
    </div>

    <script>
        const typeButtons = document.querySelectorAll('.type-option');
        const typeInput = document.getElementById('type');

        typeButtons.forEach(button => {
            button.addEventListener('click', () => {
                typeButtons.forEach(item => {
                    item.classList.remove('active');
                });

                button.classList.add('active');
                typeInput.value = button.dataset.type;
            });
        });

        // Isi tanggal dengan tanggal hari ini.
        document.getElementById('date').value =
            new Date().toLocaleDateString('en-CA');

        // Untuk sementara, form hanya menampilkan konfirmasi.
        // Data belum disimpan ke database.
        document.getElementById('transactionForm')
            .addEventListener('submit', function(event) {
                event.preventDefault();

                alert(
                    'Form berhasil diisi! Penyimpanan ke database ' +
                    'akan ditambahkan saat integrasi backend.'
                );
            });
    </script>
</body>
</html>
