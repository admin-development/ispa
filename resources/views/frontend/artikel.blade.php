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
            @if (\Request::segment(2) !== null)
                <div class="col">
                    <h1 class="m-0">{{ $data->judul }}</h1>
                    <img src="{{ asset('img/' . $data->gambar) }}" alt="" class="img-thumbnail my-3" width="650" height="350">
                    {!! $data->deskripsi !!}
                </div>
            @else
                @foreach ($data as $key => $value)
                <div class="col-lg-6 col-md-6">
                    <div class="card zoom mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('img/' . $value->gambar) }}" class="img-fluid rounded-start h-100" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $value->judul }}</h5>
                                    <p class="card-text m-0">
                                        @switch($key)
                                            @case(0)
                                                Penyakit jantung koroner adalah jenis penyakit jantung ket...
                                                @break

                                            @case(1)
                                                Stroke adalah kondisi yang terjadi ketika pasokan darah ke...
                                                @break

                                            @case(2)
                                                Hipertensi atau tekanan darah tinggi merupakan kondisi ket...
                                                @break

                                            @case(3)
                                                Diabetes atau penyakit gula (gula darah tinggi) adalah pen...
                                                @break

                                            @case(4)
                                                Penyakit asam urat merupakan kondisi yang dapat menyebabka...
                                                @break
                                        
                                            @default
                                                Tidak ada Artikel
                                        @endswitch
                                        <a href="{{ route('artikel.detail', $value->id) }}"><small>Selengkapnya</small></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</main>
@endsection

@section('js')
<script>

</script>
@endsection