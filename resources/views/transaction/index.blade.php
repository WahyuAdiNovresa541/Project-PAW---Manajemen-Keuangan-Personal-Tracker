<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Transaksi (Dummy Syifa)</h1>
            <a href="/dashboard" class="text-sm text-blue-500 hover:underline">&larr; Kembali ke Dashboard</a>
        </div>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3">ID</th>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Jenis</th>
                    <th class="p-3">Kategori</th>
                    <th class="p-3">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $item->id }}</td>
                        <td class="p-3">{{ $item->tanggal }}</td>
                        <td class="p-3">{{ $item->jenis }}</td>
                        <td class="p-3">{{ $item->kategori }}</td>
                        <td class="p-3">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">Belum ada data transaksi di MySQL.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>