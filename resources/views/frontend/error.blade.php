@extends('welcome')

@section('css')
<style>
   
</style>
@endsection

@section("content")
<main id="main">
    <div class="container my-4">
        <div class="section-title">
            <h2 class="m-0">Diagnosa</h2>
        </div>
        <div class="text-center">
            <h4 class="text-danger mb-4">{{ $message }}</h4>
            <a href="{{ route('diagnosa') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>
    
</script>
@endsection