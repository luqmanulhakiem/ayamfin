@extends('src.index')

@section('content')
    <div class="row align-self-center">
        <div class="col-12 col-md-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Karyawan</h6>
                </div>
                <div class="card-body p-3 pt-0 mt-3 pb-2">
                    <form action="{{ route('karyawan.store') }}" method="POST" id="categoryForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap<span class="text-danger">*</span> </label>
                            <input id="name" name="full_name" type="text" class="form-control"
                                placeholder="Nama Lengkap Karyawan" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Posisi/Jabatan</label>
                            <input id="name" name="position" type="text" class="form-control"
                                placeholder="Cth: Tenaga Lapangan">
                        </div>
                        <div class="form-group">
                            <label for="name">Nomer HP</label>
                            <input id="name" name="phone_number" type="number" class="form-control"
                                placeholder="Cth: 628XXZZZZYYYY">
                        </div>
                        <div class="form-group">
                            <label for="name">Alamat</label>
                            <textarea id="name" name="address" type="text" class="form-control" placeholder="Cth: Jln Suka Makmur"></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
                    {{-- <div class="table-responsive p-0">
                        
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Script untuk Logika Tampilan Form --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('type');
            const pengeluaranTypeGroup = document.getElementById('pengeluaranTypeGroup');
            const typePengeluaranSelect = document.getElementById('type_pengeluaran');

            // Fungsi untuk mengatur visibilitas dan atribut 'required'
            function togglePengeluaranTypeForm() {
                if (typeSelect.value === 'pengeluaran') {
                    pengeluaranTypeGroup.style.display = 'block'; // Tampilkan form
                    typePengeluaranSelect.setAttribute('required', 'required'); // Set 'required'
                    typePengeluaranSelect.value = ""
                } else {
                    pengeluaranTypeGroup.style.display = 'none'; // Sembunyikan form
                    typePengeluaranSelect.removeAttribute('required'); // Hapus 'required'
                    typePengeluaranSelect.value = null; // Reset nilai jika disembunyikan
                }
            }

            // Panggil fungsi saat halaman pertama kali dimuat
            // Ini penting jika Anda memiliki nilai yang sudah terpilih dari database
            togglePengeluaranTypeForm();

            // Panggil fungsi setiap kali pilihan di dropdown 'Tipe Kategori' berubah
            typeSelect.addEventListener('change', togglePengeluaranTypeForm);

        });
    </script>
@endsection
