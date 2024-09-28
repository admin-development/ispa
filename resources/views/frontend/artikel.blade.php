@extends('welcome')

@section('css')
<style>
    .zoom {
        transition: .25s;
    }
    .zoom:hover {
        transform: scale(1.05);
    }
</style>
@endsection

@section("content")
<main id="main">
    <div class="container my-4">
        <div class="section-title">
            <h2 class="m-0">Artikel</h2>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="m-0">{{ $data->judul }}</h1>
                <img src="{{ asset('images/' . $data->image) }}" alt="" class="img-thumbnail my-3" width="650" height="350">
                {!! $data->deskripsi !!}
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>

</script>
@endsection