<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Laporan Laba Rugi</h1>
    <h2>Tahun {{ $year }}</h2>
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Pengeluaran</th>
                <th>Pemasukan</th>
                <th>Keuntungan</th>
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

</body>

</html>
