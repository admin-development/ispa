@extends('welcome')

@section('css')
<style>
    #edukasi {
        margin-top: 4rem;
    }
</style>
@endsection

@section("content")
<section id="edukasi" class="recent-posts section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Edukasi</h2>
    </div>
    <div class="container">
        <div class="row gy-4">
            @foreach ($articles as $article)
            @if ($i === 3)
                @php
                    $i = 0;
                    $delay = 0;
                @endphp
            @endif
            @php
                $i++;
                $delay += 100;
            @endphp
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                <article>
                    <div class="post-img">
                        <img src="{{ asset('images') . '/' . $article->image }}" alt="{{ $article->image }}" class="img-fluid">
                    </div>
                    <h2 class="title">
                        <a href="{{ route('edukasi', $article->id) }}">{{ $article->judul }}</a>
                    </h2>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection