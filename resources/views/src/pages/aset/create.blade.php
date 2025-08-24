@extends('src.index')

@section('content')
    <div class="row align-self-center">
        <div class="col-12 col-md-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Aset</h6>
                </div>
                <div class="card-body p-3 pt-0 mt-3 pb-2">
                    <form action="{{ route('aset.store') }}" method="POST" id="categoryForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Aset<span class="text-danger">*</span> </label>
                            <input id="name" name="asset_name" type="text" class="form-control"
                                placeholder="Nama Aset" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Tipe Aset<span class="text-danger">*</span></label>
                            <input id="name" name="asset_type" type="text" class="form-control"
                                placeholder="Cth: Kandang, Kendaraan" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Asal Aset<span class="text-danger">*</span></label>
                            <input id="name" name="asset_origin" type="text" class="form-control"
                                placeholder="Cth: Modal Pribadi / Hutang Bank" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggal Akuisisi<span class="text-danger">*</span></label>
                            <input id="name" name="acquisition_date" type="date" class="form-control"
                                placeholder="Cth: 100.000" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Harga Akuisisi<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text">Rp.
                                </div>
                                <input id="name" name="acquisition_cost" type="number" class="form-control"
                                    placeholder="Cth: 100.000" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Perkiraan Umur Aset<span class="text-danger">*</span></label>
                            <input id="name" name="estimated_useful_life_years" type="number" class="form-control"
                                placeholder="Cth: 1 yang dianggap 1 Tahun" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Deskripsi</label>
                            <textarea id="name" name="description" type="text" class="form-control" placeholder="masukkan deskripsi aset"></textarea>
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
