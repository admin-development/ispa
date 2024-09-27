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
            <h6 class="m-0">Tabel Master</h6>
            <a href="{{ route('penyakit.create') }}" class="badge bg-primary text-light">Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle table-hover" id="dataTable">
                    <thead class="text-center">
                        <tr>
                            <th width="5%">#</th>
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Solusi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $value)
                        <tr>
                            <td class="text-center">{{ $key + 1 }}</td>
                            <td>{{ $value->kode_penyakit }}</td>
                            <td>{{ $value->nama_penyakit }}</td>
                            <td>{{ $value->solusi }}</td>
                            <td class="text-center">
                                <a href="{{ route('penyakit.edit', $value->id) }}" class="badge bg-success text-light">Ubah</a>
                                <form action="{{ route('penyakit.destroy', $value->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="badge badge-danger" onclick="return hasDelete()">Hapus</button>
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

</script>
@endsection