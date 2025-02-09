@extends("dashboard")

@section('css')
<style>
    
</style>
@endsection

@section("content")
<div >
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0">Data Gejala</h6>
            <a href="{{ route('gejala.index') }}" class="badge bg-primary text-light">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('gejala.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating">
                            <label for="kode_gejala">Kode Gejala</label>
                            <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" placeholder="Kode Gejala" value="{{ old('kode_gejala', $data) }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="nama_gejala">Nama Gejala</label>
                            <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" placeholder="Nama Gejala" value="{{ old('nama_gejala') }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary py-3 w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection