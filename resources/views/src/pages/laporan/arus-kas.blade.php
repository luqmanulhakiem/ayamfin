@extends('src.index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex flex-column flex-md-row justify-content-md-between align-items-center">
                    <h6>Arus Kas</h6>
                    <a href="{{ route('arus-kas.export', ['startDate' => $startDate, 'endDate' => $endDate]) }}"
                        class="btn btn-sm btn-primary">Download</a>

                </div>

                <!-- Button trigger modal -->

                <button type="button" class="btn btn-primary col-3 col-md-1 p-2 ms-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Filter
                </button>

                <div class="row">
                    <div class="col-4">
                        <div class="card-body">
                            <div class="card">
                                <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                                <x-currency-formatter amount="{{ $saldoSaatIni }}" />
                                            </h5>
                                            <span class="text-white text-sm">Total Saldo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-body">
                            <div class="card">
                                <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                                <x-currency-formatter amount="{{ $kreditSaatIni }}" />
                                            </h5>
                                            <span class="text-white text-sm">Total Kredit</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-body">
                            <div class="card">
                                <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                                <div class="card-body p-3 position-relative">
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                                <x-currency-formatter amount="{{ $debitSaatIni }}" />
                                            </h5>
                                            <span class="text-white text-sm">Total Debit</span>
                                        </div>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tanggal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Kategori</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data) > 0)
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->kategori->name }}</h6>
                                                        <p class="mb-0 text-sm">Dibuat oleh {{ $item->user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>


                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">

                                                        <h6 class="mb-0 text-sm">
                                                            {{ \Carbon\Carbon::parse($item->date_transaction)->format('j F Y') }}
                                                        </h6>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 badge bg-secondary" style="font-size: 12px;">
                                                            {{ ucwords($item->kategori->type) }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6
                                                            class="mb-0 text-sm d-flex {{ $item->kategori->type == 'pengeluaran' ? 'text-danger' : 'text-success' }}">
                                                            {{ $item->kategori->type == 'pengeluaran' ? '- ' : '+ ' }}
                                                            <x-currency-formatter amount="{{ $item->amount }}" />
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Tidak ada item</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('arus-kas') }}" method="GET">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Filter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-input mb-3">
                        <label for="startDate">Tanggal Mulai</label>
                        <input type="date" id="startDate" class="form-control" name="startDate" required>
                    </div>
                    <div class="form-input mb-3">
                        <label for="endDate">Tanggal Akhir</label>
                        <input type="date" id="endDate" class="form-control" name="endDate" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
