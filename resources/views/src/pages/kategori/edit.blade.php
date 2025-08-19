@extends('src.index')

@section('content')
    <div class="row align-self-center">
        <div class="col-12 col-md-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Kategori</h6>
                </div>
                <div class="card-body p-3 pt-0 mt-3 pb-2">
                    <form action="{{ route('kategori.update', ['id' => $data->id]) }}" method="POST" id="categoryForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Kategori<span class="text-danger">*</span> </label>
                            <input id="name" name="name" type="text" class="form-control"
                                placeholder="Contoh: Gaji Karyawan / Penjualan Ayam" value="{{ $data->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe Kategori<span class="text-danger">*</span> </label>
                            <select class="form-control" name="type" id="type" disabled>
                                <option value="">Pilih Tipe</option>
                                <option value="pengeluaran" {{ $data->type == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran
                                </option>
                                <option value="pemasukan" {{ $data->type == 'pemasukan' ? 'selected' : '' }}>Pemasukan
                                </option>
                            </select>
                        </div>
                        <div class="form-group" id="pengeluaranTypeGroup" style="display: none;">
                            <label for="type_pengeluaran">Tipe Pengeluaran<span class="text-danger">*</span> </label>
                            <select class="form-control" name="type_pengeluaran" id="type_pengeluaran">
                                <option value="">Pilih Tipe Pengeluaran</option>
                                <option value="hpp" {{ $data->type_pengeluaran == 'hpp' ? 'selected' : '' }}>HPP
                                </option>
                                <option value="operasional"
                                    {{ $data->type_pengeluaran == 'operasional' ? 'selected' : '' }}>Operasional
                                </option>

                            </select>
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
                    const dataFromBackend = "{{ $data->type_pengeluaran ?? '' }}";
                    pengeluaranTypeGroup.style.display = 'block'; // Tampilkan form
                    typePengeluaranSelect.setAttribute('required', 'required'); // Set 'required'
                    typePengeluaranSelect.value = dataFromBackend;
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
