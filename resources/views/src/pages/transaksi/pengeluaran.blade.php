@extends('src.index')

@section('content')
    <div class="row align-self-center">
        <div class="col-12 col-md-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Pengeluaran</h6>
                </div>
                <div class="card-body p-3 pt-0 mt-3 pb-2">
                    <form action="{{ route('pencatatan.store', ['type' => 'pengeluaran']) }}" method="POST" id="categoryForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Kategori<span class="text-danger">*</span> </label>
                            <select name="category_id" class="form-control" id="" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Jumlah<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text">Rp.
                                </div>
                                <input id="name" name="amount" type="number" class="form-control"
                                    placeholder="Cth: 100.000" required>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </form>
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
