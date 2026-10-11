<?php

/**
 * Controller transaksi dalam pola MVC.
 * Sesuaikan nama method model dan path view dengan struktur proyek.
 */
class ControllerTransactionController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    // Menampilkan semua transaksi.
    public function index()
    {
        $transactions = $this->model->getAllTransactions();
        include 'views/transaction/index.php';
    }

    // Menampilkan halaman tambah transaksi.
    public function create()
    {
        include 'views/transaction/create.php';
    }

    // Memproses penyimpanan transaksi baru.
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=transaction&action=index');
            exit;
        }

        $data = [
            'transaction_date' => trim($_POST['transaction_date'] ?? ''),
            'description'      => trim($_POST['description'] ?? ''),
            'amount'           => trim($_POST['amount'] ?? ''),
            'status'           => trim($_POST['status'] ?? ''),
        ];

        if (
            $data['transaction_date'] === '' ||
            $data['description'] === '' ||
            $data['amount'] === '' ||
            !is_numeric($data['amount'])
        ) {
            $error = 'Tanggal, deskripsi, dan jumlah transaksi harus diisi dengan benar.';
            include 'views/transaction/create.php';
            return;
        }

        $this->model->createTransaction($data);

        header('Location: index.php?controller=transaction&action=index');
        exit;
    }

    // Menampilkan detail transaksi untuk diedit.
    public function edit($id = null)
    {
        $id = $id ?? ($_GET['id'] ?? null);

        if ($id === null) {
            header('Location: index.php?controller=transaction&action=index');
            exit;
        }

        $transaction = $this->model->getTransactionById($id);

        if (!$transaction) {
            http_response_code(404);
            echo 'Data transaksi tidak ditemukan.';
            return;
        }

        include 'views/transaction/edit.php';
    }

    // Memproses perubahan transaksi.
    public function update($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=transaction&action=index');
            exit;
        }

        $id = $id ?? ($_POST['id'] ?? $_GET['id'] ?? null);

        if ($id === null) {
            header('Location: index.php?controller=transaction&action=index');
            exit;
        }

        $data = [
            'transaction_date' => trim($_POST['transaction_date'] ?? ''),
            'description'      => trim($_POST['description'] ?? ''),
            'amount'           => trim($_POST['amount'] ?? ''),
            'status'           => trim($_POST['status'] ?? ''),
        ];

        if (
            $data['transaction_date'] === '' ||
            $data['description'] === '' ||
            $data['amount'] === '' ||
            !is_numeric($data['amount'])
        ) {
            $transaction = array_merge(['id' => $id], $data);
            $error = 'Tanggal, deskripsi, dan jumlah transaksi harus diisi dengan benar.';
            include 'views/transaction/edit.php';
            return;
        }

        $this->model->updateTransaction($id, $data);

        header('Location: index.php?controller=transaction&action=index');
        exit;
    }

    // Menghapus transaksi.
    public function delete($id = null)
    {
        $id = $id ?? ($_POST['id'] ?? $_GET['id'] ?? null);

        if ($id === null) {
            header('Location: index.php?controller=transaction&action=index');
            exit;
        }

        $this->model->deleteTransaction($id);

        header('Location: index.php?controller=transaction&action=index');
        exit;
    }
}
