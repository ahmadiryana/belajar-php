<?php
// Bagian ini berjalan di Server sebelum halaman dikirim ke Browser
$judulHalaman = "Sistem Informasi HR - Server PHP";

// Associative Array di PHP (Konsepnya sama persis seperti Array of Objects di JavaScript)
$daftarKaryawan = [
    [
        "nip" => "EMP001",
        "nama" => "Ahmad",
        "divisi" => "IT Development",
        "gaji" => 9500000
    ],
    [
        "nip" => "EMP002",
        "nama" => "Amad",
        "divisi" => "Human Resources",
        "gaji" => 5500000
    ],
    [
        "nip" => "EMP003",
        "nama" => "Ahad",
        "divisi" => "Finance",
        "gaji" => 7200000
    ],
    [
        "nip" => "EMP004",
        "nama" => "Amed",
        "divisi" => "IT Development",
        "gaji" => 11000000
    ],
    [
        "nip" => "EMP005",
        "nama" => "Ahmed",
        "divisi" => "Finance",
        "gaji" => 4500000
    ]
    // TUGAS 1: Tambahkan minimal 2 data karyawan lagi ke dalam array PHP ini
];

$totalPengeluaran = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mencetak variabel PHP ke dalam HTML menggunakan < ?= ... ?> -->
    <title><?= $judulHalaman ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-8 font-sans text-slate-800">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-900"><?= $judulHalaman ?></h1>
            <p class="text-sm text-slate-500">Data dirender langsung dari Server PHP <?= phpversion() ?></p>
        </div>

        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-slate-200 text-left uppercase text-slate-700">
                    <th class="p-3 border">NIP</th>
                    <th class="p-3 border">Nama Lengkap</th>
                    <th class="p-3 border">Divisi</th>
                    <th class="p-3 border">Gaji Pokok</th>
                    <th class="p-3 border">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <!-- Perulangan foreach di dalam HTML -->
                <?php foreach ($daftarKaryawan as $karyawan): ?>
                    <?php 
                        // TUGAS 2: Tambahkan nilai $karyawan["gaji"] ke dalam $totalPengeluaran
                        // Petunjuk: $totalPengeluaran += $karyawan["gaji"];
                        $totalPengeluaran += $karyawan["gaji"];     
                    ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 border font-mono"><?= $karyawan["nip"] ?></td>
                        <td class="p-3 border font-medium"><?= $karyawan["nama"] ?></td>
                        <td class="p-3 border"><?= $karyawan["divisi"] ?></td>
                        <!-- Fungsi number_format() di PHP sama seperti toLocaleString() di JS -->
                        <td class="p-3 border">Rp <?= number_format($karyawan["gaji"], 0, ',', '.') ?></td>
                        <td class="p-3 border">
                            <!-- TUGAS 3: Buat pengkondisian if-else PHP di sini -->
                            <!-- Jika $karyawan["gaji"] >= 8000000 tampilkan teks "Senior", selain itu tampilkan "Junior" -->
                            <?php if ($karyawan["gaji"] >= 8000000): ?>
                                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-xs font-semibold">Senior</span>
                            <?php else: ?>
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">Junior</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-4 text-right font-bold text-slate-700">
            Total Pengeluaran Gaji: 
            <span class="text-green-700">
                <!-- TUGAS 4: Cetak variabel $totalPengeluaran menggunakan number_format() -->
                Rp <?= number_format($totalPengeluaran, 0, ',', '.') ?>
            </span>
        </div>
    </div>

</body>
</html>