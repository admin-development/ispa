@extends('welcome')

@section('css')
<style>
    button {
        border: 0;
    }
    #riwayat {
        margin-top: 4rem;
    }
</style>
@endsection

@section("content")
<section id="riwayat" class="riwayat section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Riwayat<br></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                @if (isset($hd))
                <h4 class="text-start">Riwayat Diagnosa ({{ \Session::get('nama') }})</h4>
                <table class="table table-bordered align-middle table-hover" id="riwayatTable">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">#</th>
                            <th>Tanggal</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Hasil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hd as $key => $value)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $value['tanggal'] }}</td>
                            <td>{{ $value['kode_penyakit'] }}</td>
                            <td>{{ $value['nama_penyakit'] }}</td>
                            <td>{{ $value['hasil_nilai'] }}</td>
                            <td class="text-center">
                                <form class="d-inline" action="{{ route('riwayat') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tanggal" value="{{ $value['tanggal'] }}">
                                    <input type="hidden" name="id_user" value="{{ $value['id_user'] }}">
                                    <button type="submit" class="badge bg-primary text-light">Detail</button>
                                </form>
                                <form class="d-inline" action="{{ route('riwayat.print') }}" method="POST" target="_black">
                                    @csrf
                                    <input type="hidden" name="tanggal" value="{{ $value['tanggal'] }}">
                                    <input type="hidden" name="id_user" value="{{ $value['id_user'] }}">
                                    <button type="submit" class="badge bg-info text-light">Cetak</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
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
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $('#riwayatTable').DataTable({
        paging: false,
        info: false,
        searching: false
    });
</script>
@endsection