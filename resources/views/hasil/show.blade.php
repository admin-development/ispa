@extends("dashboard")

@section('css')
<style>
    form {
        display: inline
    }
    button {
        border: 0;
    }
</style>
@endsection

@section("content")
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0">Data Riwayat Diagnosa</h6>
            <a href="{{ route('riwayat-diagnosa.index') }}" class="badge bg-primary text-light">Kembali</a>
        </div>
        <div class="card-body">
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
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection