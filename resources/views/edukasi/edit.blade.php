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
            <form action="{{ route('edukasi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3 d-none" id="sOh">
                    <div class="col-6">
                        <img src="{{ asset('images/' . $data->image) }}" alt="" class="img-thumbnail" id="gambarPreview">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="image">image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="image" accept="image/*" disabled>
                        </div>
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="isOn(this.checked)">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{ old('judul', $data->judul) }}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <label for="deskripsi">Solusi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Solusi" style="height: 150px;">{{ old('deskripsi', $data->deskripsi) }}</textarea>
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
    tinymce.init({
        selector: 'textarea#deskripsi'
    });
    function isOn(v) {
        let formFile = $('#image');
        let sOh = $('#sOh');
        if (v) {
            formFile.attr('name','image');
            formFile.removeAttr('disabled');
            sOh.removeClass('d-none');
        } else {
            formFile.attr('disabled','disabled');
            formFile.removeAttr('name');
            sOh.addClass('d-none');
        }
    }
    image.onchange = evt => {
        const [file] = image.files
        if (file) {
            gambarPreview.src = URL.createObjectURL(file);
        }
    }
</script>
@endsection