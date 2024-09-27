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
            <h6 class="m-0">Tabel Riwayat Diagnosa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle table-hover" id="riwayatTable">
                    <thead class="text-center">
                        <tr>
                            <th width="5%">#</th>
                            <th>Tanggal</th>
                            <th>Nama User</th>
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
                            <td>{{ $value['nama'] }}</td>
                            <td>{{ $value['nama_penyakit'] }}</td>
                            <td>{{ $value['hasil_nilai'] }}</td>
                            <td class="text-center">
                                <form class="d-inline" action="{{ route('riwayat-diagnosa.detail') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tanggal" value="{{ $value['tanggal'] }}">
                                    <input type="hidden" name="id_user" value="{{ $value['id_user'] }}">
                                    <button type="submit" class="badge bg-info text-light">Detail</button>
                                </form>
                                <form class="d-inline" action="{{ route('riwayat-diagnosa.print') }}" method="POST" target="_black">
                                    @csrf
                                    <input type="hidden" name="tanggal" value="{{ $value['tanggal'] }}">
                                    <input type="hidden" name="id_user" value="{{ $value['id_user'] }}">
                                    <button type="submit" class="badge bg-primary text-light">Cetak</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#riwayatTable').DataTable({
        searching: false,
        ordering: false,
        lengthMenu: [
            [5, -1],
            [5, 'All']
        ]
    });
</script>
@endsection