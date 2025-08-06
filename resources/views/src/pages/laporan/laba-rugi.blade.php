@extends('src.index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex flex-column flex-md-row justify-content-md-between align-items-center">
                    <h6>Laba Rugi</h6>
                    <a href="{{ route('laba-rugi.export') }}" class="btn btn-sm btn-primary">Download</a>

                </div>

                <!-- Button trigger modal -->

                <button type="button" class="btn btn-primary col-3 col-md-1 p-2 ms-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Filter
                </button>

                <div class="card-body">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="card">
                            <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                            <div class="card-body p-3 position-relative">
                                <div class="row">
                                    <div class="col-8 text-start">
                                        <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                            Rp. {{ $totalKeuntungan }}
                                        </h5>
                                        <span class="text-white text-sm">Total Keuntungan {{ $tahun }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bulan
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Pengeluaran</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Pemasukan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Keuntungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keuntunganBulanan as $bulan)
                                    <tr>
                                        <td>
                                            <h6>{{ $bulan['month'] }}</h6>
                                        </td>
                                        <td>
                                            <p class="text-sm">Rp.{{ $bulan['pengeluaran'] }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm">Rp.{{ $bulan['pemasukan'] }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm">Rp.{{ $bulan['keuntungan'] }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('laba-rugi') }}" method="GET">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" class="form-control" name="tahun" min="1900" max="2099" step="1"
                        value="{{ $tahun }}" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
