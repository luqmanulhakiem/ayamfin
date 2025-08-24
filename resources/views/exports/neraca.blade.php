<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Laporan Neraca</h1>
    <table>
        <thead>
            <tr>
                <th>Aset</th>
                <th>Jumlah</th>
                <th>Kewajiban + Ekuitas</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>
                        <h6>{{ $item->asset_name }}</h6>
                    </td>
                    <td>
                        Rp.
                        {{ number_format($item->acquisition_cost, 0, ',', '.') }}
                    </td>
                    <td>
                        <h6>{{ $item->asset_origin }}</h6>
                    </td>
                    <td>
                        Rp.
                        {{ number_format($item->acquisition_cost, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
