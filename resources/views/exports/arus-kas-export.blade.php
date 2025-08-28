<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Laporan Arus Kas</h1>
    <table>
        <thead>
            <tr>
                <th>Total Saldo</th>
                <td>
                    Rp. {{ number_format($saldoSaatIni, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <th>Total Kredit</th>
                <td>
                    Rp. {{ number_format($kreditSaatIni, 0, ',', '.') }}
                </td>
            </tr>
            <tr>
                <th>Total Debit</th>
                <td>
                    Rp. {{ number_format($debitSaatIni, 0, ',', '.') }}
                </td>
            </tr>
        </thead>
    </table>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Kuantitas</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        <h6>{{ $item->kategori->name }}</h6>
                    </td>
                    <td>
                        <p class="text-sm">{{ \Carbon\Carbon::parse($item->date_transaction)->format('j F Y') }}</p>
                    </td>
                    <td>
                        <p class="text-sm"> {{ ucwords($item->kategori->type) }}</p>
                    </td>
                    <td>
                        <p class="text-sm">
                            {{ $item->quantity == null ? '' : $item->quantity . ' ' . $item->quantity_unit }}
                        </p>
                    </td>
                    <td>
                        {{ $item->kategori->type == 'pengeluaran' ? '- ' : '+ ' }}Rp.
                        {{ number_format($item->amount, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
