@extends("dashboard")

@section('css')
<style>
    
</style>
@endsection

@section("content")
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0">Data Nilai CF</h6>
            <a href="{{ route('nilai-cf.index') }}" class="badge bg-primary text-light">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('nilai-cf.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="id_penyakit">Nama Penyakit</label>
                            <select class="form-control" id="id_penyakit" name="id_penyakit">
                                <option disabled selected>-- Pilih Penyakit --</option>
                                @foreach ($data['penyakit'] as $value)
                                <option value="{{ $value->id }}">{{ $value->nama_penyakit }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="id_gejala">Nama Gejala</label>
                            <select class="form-control" id="id_gejala" name="id_gejala">
                                <option disabled selected>-- Pilih Gejala --</option>
                                @foreach ($data['gejala'] as $value)
                                <option value="{{ $value->id }}">{{ $value->nama_gejala }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="mb">Measure of Belief</label>
                            <input type="number" class="form-control" id="mb" name="mb" step="0.1" placeholder="Measure of Belief" value="0" onkeypress="return false">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="md">Measure of Disbelief</label>
                            <input type="number" class="form-control" id="md" name="md" step="0.1" placeholder="Measure of Disbelief" value="0" onkeypress="return false">
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