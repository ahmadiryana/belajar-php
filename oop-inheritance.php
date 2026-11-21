<?php
declare(strict_types=1);

// 1. PARENT CLASS (Kelas Induk)
class Karyawan 
{
    public string $nip;
    public string $nama;
    public int $gajiPokok;

    public function __construct(string $nip, string $nama, int $gajiPokok)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->gajiPokok = $gajiPokok;
    }

    public function getJabatan(): string
    {
        return "Staff Reguler";
    }

    public function hitungTotalGaji(): int
    {
        return $this->gajiPokok;
    }
}

// 2. CHILD CLASS (Kelas Anak) - Mewarisi Karyawan dengan 'extends'
class Manager extends Karyawan 
{
    public int $tunjanganJabatan;

    public function __construct(string $nip, string $nama, int $gajiPokok, int $tunjanganJabatan)
    {
        // Memanggil constructor milik Parent Class (Karyawan)
        parent::__construct($nip, $nama, $gajiPokok);
        $this->tunjanganJabatan = $tunjanganJabatan;
    }

    // Mengubah (Override) jabatan khusus untuk Manager
    public function getJabatan(): string
    {
        return "Manager Divisi";
    }

    // TUGAS 1: Buat method public function hitungTotalGaji(): int
    // yang mengembalikan hasil penjumlahan $this->gajiPokok + $this->tunjanganJabatan
    public function hitungTotalGaji(): int
    {
        return $this->gajiPokok + $this->tunjanganJabatan;
    }
    
}

$timPerusahaan = [
    new Karyawan("EMP001", "Ahmad", 6000000),
    new Karyawan("EMP002", "Amad", 5500000),
    new Manager("MGR001", "Ahad", 10000000, 5000000),
    // TUGAS 2: Tambahkan 1 objek 'new Manager(...)' lagi di bawah ini
    new Manager("MGR002", "Ahmed", 12000000, 6000000),
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PHP OOP Inheritance - Minggu 8</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-8 font-sans text-slate-800">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-slate-900 mb-1">Struktur Jabatan & Gaji (OOP Inheritance)</h1>
        <p class="text-sm text-slate-500 mb-6">Simulasi konsep 'extends' yang digunakan pada Model & Controller Laravel</p>

        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-slate-200 text-left uppercase text-slate-700">
                    <th class="p-3 border">NIP</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Jabatan</th>
                    <th class="p-3 border">Gaji Pokok</th>
                    <th class="p-3 border">Total Gaji (+Tunjangan)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($timPerusahaan as $orang): ?>
                    <tr class="hover:bg-slate-50">
                        <td class="p-3 border font-mono"><?= $orang->nip ?></td>
                        <td class="p-3 border font-medium"><?= $orang->nama ?></td>
                        <td class="p-3 border"><?= $orang->getJabatan() ?></td>
                        <td class="p-3 border">Rp <?= number_format($orang->gajiPokok, 0, ',', '.') ?></td>
                        <td class="p-3 border font-bold text-blue-700">
                            <!-- TUGAS 3: Panggil method $orang->hitungTotalGaji() di dalam number_format() -->
                        Rp <?= number_format($orang->hitungTotalGaji(), 0, ',', '.') ?>     
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>