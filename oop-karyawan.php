<?php
// Memaksa PHP memeriksa tipe data secara ketat (Standar Industri PHP 8+)
declare(strict_types=1);

class Karyawan 
{
    // 1. Property (Data milik Class)
    public string $nip;
    public string $nama;
    public string $divisi;
    public int $gajiPokok;

    // 2. Constructor: Otomatis dijalankan saat menulis 'new Karyawan(...)'
    public function __construct(string $nip, string $nama, string $divisi, int $gajiPokok)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->divisi = $divisi;
        $this->gajiPokok = $gajiPokok;
    }

    // 3. Method untuk menentukan status pajak
    public function hitungPajak(): int
    {
        // Aturan: Gaji >= 6.000.000 kena pajak 5%, di bawah itu Rp 0
        if ($this->gajiPokok >= 6000000) {
            return (int) ($this->gajiPokok * 0.05);
        }
        return 0;
    }

    // TUGAS 1: Buat sebuah public function bernama hitungGajiBersih(): int
    // yang mengembalikan (return) hasil dari $this->gajiPokok dikurangi $this->hitungPajak()
    // Petunjuk:
    public function hitungGajiBersih(): int
    {
        return $this->gajiPokok - $this->hitungPajak();
    }
}

// Mencetak Objek Karyawan dari Class Karyawan menggunakan kata kunci 'new'
$daftarKaryawan = [
    new Karyawan("EMP001", "Ahmad", "IT Development", 9500000),
    new Karyawan("EMP002", "Amad", "Human Resources", 5500000),
    new Karyawan("EMP003", "Ahad", "Finance", 7200000),
    new Karyawan("EMP004", "Ammad", "IT Development", 11000000),
    new Karyawan("EMP005", "Ahhad", "Finance", 4500000),
    new Karyawan("EMP006", "Amed", "IT Development", 6000000),
    new Karyawan("EMP007", "Ahmed", "Finance", 8200000),
    // TUGAS 2: Tambahkan minimal 2 objek 'new Karyawan(...)' lagi di bawah ini
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PHP OOP - Sistem Payroll</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-8 font-sans text-slate-800">

    <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-slate-900 mb-1">Sistem Payroll Berbasis PHP OOP</h1>
        <p class="text-sm text-slate-500 mb-6">Menggunakan Class, Constructor, Property, dan Method (Fondasi Laravel)</p>

        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-slate-200 text-left uppercase text-slate-700">
                    <th class="p-3 border">NIP</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Divisi</th>
                    <th class="p-3 border">Gaji Pokok</th>
                    <th class="p-3 border">Potongan Pajak (5%)</th>
                    <th class="p-3 border">Gaji Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($daftarKaryawan as $emp): ?>
                    <tr class="hover:bg-slate-50">
                        <!-- Perhatikan: Mengakses property Object memakai tanda panah (->), bukan kurung siku [...] -->
                        <td class="p-3 border font-mono"><?= $emp->nip ?></td>
                        <td class="p-3 border font-medium"><?= $emp->nama ?></td>
                        <td class="p-3 border"><?= $emp->divisi ?></td>
                        <td class="p-3 border">Rp <?= number_format($emp->gajiPokok, 0, ',', '.') ?></td>
                        <td class="p-3 border text-red-600">Rp <?= number_format($emp->hitungPajak(), 0, ',', '.') ?></td>
                        <td class="p-3 border font-bold text-green-700">
                            <!-- TUGAS 3: Panggil method $emp->hitungGajiBersih() di dalam number_format() -->
                            <?= number_format($emp->hitungGajiBersih(), 0, ',', '.') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>