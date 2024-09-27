@extends("dashboard")

@section('css')
<style>
    
</style>
@endsection

@section("content")
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0">Data Penyakit</h6>
            <a href="{{ route('penyakit.index') }}" class="badge bg-primary text-light">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('penyakit.update', $data->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 col-md-2 col-xl-2">
                        <div class="form-floating">
                            <label for="kode_penyakit">Kode Penyakit</label>
                            <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" placeholder="Kode Penyakit" value="{{ old('kode_penyakit', $data->kode_penyakit) }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="nama_penyakit">Nama Penyakit</label>
                            <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama Penyakit" value="{{ old('nama_penyakit', $data->nama_penyakit) }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="solusi">Solusi</label>
                            <textarea name="solusi" class="form-control" id="solusi" placeholder="Solusi" style="height: 150px;">{{ old('solusi', $data->solusi) }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary py-3 w-100">Perbarui</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection