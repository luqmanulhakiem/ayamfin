<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pemasukan = [
            ["name" => "Penjualan Ayam", "type" => "pemasukan"],
        ];
        $pengeluaran = [
            ["name" => "Pembelian DOC", "type" => "pengeluaran", "type_pengeluaran" => "hpp"],
            ["name" => "Pakan", "type" => "pengeluaran", "type_pengeluaran" => "hpp"],
            ["name" => "Obat & Vitamin", "type" => "pengeluaran", "type_pengeluaran" => "hpp"],
            ["name" => "Gaji Karyawan", "type" => "pengeluaran", "type_pengeluaran" => "operasional"],
            ["name" => "Listrik & Air", "type" => "pengeluaran", "type_pengeluaran" => "operasional"],
            ["name" => "Transportasi", "type" => "pengeluaran", "type_pengeluaran" => "operasional"],
            ["name" => "Perbaikan & Pemeliharaan", "type" => "pengeluaran", "type_pengeluaran" => "operasional"],
            ["name" => "Administrasi & Umum", "type" => "pengeluaran", "type_pengeluaran" => "operasional"],
        ];

        Kategori::insert($pemasukan);
        Kategori::insert($pengeluaran);
    }
}
