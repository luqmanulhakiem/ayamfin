@extends('src.index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex flex-column flex-md-row justify-content-md-between align-items-center">
                    <h6>Management Kategori</h6>
                    <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">Tambah Kategori</a>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tipe</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($data) > 0)
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <span
                                                    class="badge badge-sm bg-gradient-{{ $item->type === 'pemasukan' ? 'success' : 'danger' }}">{{ $item->type }}
                                                    @if ($item->type === 'pengeluaran')
                                                        - {{ $item->type_pengeluaran }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <span
                                                    class="badge badge-sm bg-{{ $item->status === 'active' ? 'success' : 'danger' }}">{{ $item->status }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('kategori.edit', ['id' => $item->id]) }}" type="button"
                                                    class="badge bg-warning">
                                                    <svg width='16px' height="16px" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                        <path
                                                            d="M416.9 85.2L372 130.1L509.9 268L554.8 223.1C568.4 209.6 576 191.2 576 172C576 152.8 568.4 134.4 554.8 120.9L519.1 85.2C505.6 71.6 487.2 64 468 64C448.8 64 430.4 71.6 416.9 85.2zM338.1 164L122.9 379.1C112.2 389.8 104.4 403.2 100.3 417.8L64.9 545.6C62.6 553.9 64.9 562.9 71.1 569C77.3 575.1 86.2 577.5 94.5 575.2L222.3 539.7C236.9 535.6 250.2 527.9 261 517.1L476 301.9L338.1 164z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('kategori.update.status', ['id' => $item->id]) }}"
                                                    type="button"
                                                    class="badge {{ $item->status == 'active' ? 'bg-danger' : 'bg-success' }}">
                                                    @if ($item->status == 'active')
                                                        <svg width='16px' height="16px"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path
                                                                d="M431.2 476.5L163.5 208.8C141.1 240.2 128 278.6 128 320C128 426 214 512 320 512C361.5 512 399.9 498.9 431.2 476.5zM476.5 431.2C498.9 399.8 512 361.4 512 320C512 214 426 128 320 128C278.5 128 240.1 141.1 208.8 163.5L476.5 431.2zM64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320z" />
                                                        </svg>
                                                    @else
                                                        <svg width='16px' height="16px"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path
                                                                d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM404.4 276.7L324.4 404.7C320.2 411.4 313 415.6 305.1 416C297.2 416.4 289.6 412.8 284.9 406.4L236.9 342.4C228.9 331.8 231.1 316.8 241.7 308.8C252.3 300.8 267.3 303 275.3 313.6L302.3 349.6L363.7 251.3C370.7 240.1 385.5 236.6 396.8 243.7C408.1 250.8 411.5 265.5 404.4 276.8z" />
                                                        </svg>
                                                    @endif
                                                    {{-- {{ $item->status == 'active' ? 'Matikan' : 'Nyalakan' }} --}}
                                                </a>
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
@endsection
