<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak  Riwayat Diagnosa | Klinik</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <style>
        .kontener {
            width: 80%;
            margin: 0 auto 1rem;
        }
    </style>
</head>
<body>
    <div class="kontener">
        <h1 class="text-center mt-5 mb-3">Riwayat Diagnosa</h1>
        <table class="table table-bordered align-middle table-hover">
            <tr>
                <th width="30%">Tanggal</th>
                <td>{{ $data['detail'][0]['tanggal'] }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $data['detail'][0]['nama'] }}</td>
            </tr>
        </table>
        <table class="table table-bordered align-middle table-hover">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nama Gejala</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['gejala'] as $key => $value)
                    <tr>
                        <td class="text-center" width="5%">{{ $key + 1 }}</td>
                        <td>{{ $value->nilai_cf->gejala->nama_gejala }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <table class="table table-bordered align-middle table-hover mb-0">
            <thead>
                <tr class="text-center">
                    <th>#</th>
                    <th>Nama Penyakit</th>
                    <th>Hasil</th>
                    <th>Solusi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['detail'] as $key => $value)
                    <tr>
                        <td class="text-center" width="5%">{{ $key + 1 }}</td>
                        <td width="20%">{{ $value['nama_penyakit'] }}</td>
                        <td class="text-center" width="10%">{{ $value['hasil_nilai'] }}</td>
                        <td>{{ $value['solusi'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print()
    </script>
</body>
</html>