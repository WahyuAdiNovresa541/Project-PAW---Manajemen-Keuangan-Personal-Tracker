<?php


class ControllerTransactionController
{
    private $model;

    private const ALLOWED_TYPES = ['pemasukan', 'pengeluaran'];

    public function __construct($model)
    {
        $this->model = $model;
    }


    public function index()
    {
        $transactions = $this->model->getAllTransactions();
        include 'views/transaction/index.php';
    }

    public function create()
    {
        include 'views/transaction/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=transaction&action=index');
            exit;
        }

        $data = $this->collectInput();

        if (!$this->isValid($data)) {
            $error = 'Tanggal, jenis, deskripsi, kategori, dan jumlah transaksi harus diisi dengan benar.';
            include 'views/transaction/create.php';
            return;
        }

        $this->model->createTransaction($data);

        header('Location: index.php?controller=transaction&action=index');
        exit;
    }

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

        $data = $this->collectInput();

        if (!$this->isValid($data)) {
            $transaction = array_merge(['id' => $id], $data);
            $error = 'Tanggal, jenis, deskripsi, kategori, dan jumlah transaksi harus diisi dengan benar.';
            include 'views/transaction/edit.php';
            return;
        }

        $this->model->updateTransaction($id, $data);

        header('Location: index.php?controller=transaction&action=index');
        exit;
    }

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


    private function collectInput()
    {
        return [
            'transaction_date' => trim($_POST['transaction_date'] ?? ''),
            'type'             => strtolower(trim($_POST['type'] ?? '')),
            'description'      => trim($_POST['description'] ?? ''),
            'category'         => trim($_POST['category'] ?? ''),
            'amount'           => trim($_POST['amount'] ?? ''),
        ];
    }

    private function isValid(array $data)
    {
        return $data['transaction_date'] !== ''
            && in_array($data['type'], self::ALLOWED_TYPES, true)
            && $data['description'] !== ''
            && $data['category'] !== ''
            && $data['amount'] !== ''
            && is_numeric($data['amount'])
            && (float) $data['amount'] > 0;
    }
}
