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
            <div class="row">
                <div class="col-12">
                    <h1 class="m-0">{{ $data->judul }}</h1>
                    <img src="{{ asset('images/' . $data->image) }}" alt="" class="img-thumbnail my-3" width="650" height="350">
                    {!! $data->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection