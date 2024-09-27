@extends("dashboard")

@section('css')
<style>
    
</style>
@endsection

@section("content")
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0">Data Edukasi</h6>
            <a href="{{ route('edukasi.index') }}" class="badge bg-primary text-light">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('edukasi.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="image">image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="image" value="{{ old('image') }}" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{ old('judul') }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="deskripsi">Solusi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Solusi" style="height: 150px;"></textarea>
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
    tinymce.init({
        selector: 'textarea#deskripsi'
    });
</script>
@endsection