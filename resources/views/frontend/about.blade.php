@extends('welcome')

@section('css')
<style>
   p {
        text-align: justify;
        text-justify: inter-word;
   }
</style>
@endsection

@section("content")
<main id="main">
    <div class="container my-4">
        <div class="section-title">
            <h2 class="m-0">About</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h4 class="fw-bold text-primary">Sistem Pakar</h4>
                <p>Sistem pakar ialah rangkaian perangkat lunak yang dirancang untuk meniru kemampuan seorang pakar manusia dalam suatu bidang spesifik, dibangun berdasarkan pengetahuan dan aturan yang telah diprogram, sistem ini mampu menganalisis masalah, membuat keputusan, dan memberikan solusi, mirip dengan pendekatan yang dilakukan oleh seorang pakar manusia, komponen utama sistem pakar melibatkan knowledge base yang berisi aturan-aturan, fakta-fakta, dan heuristik, serta mesin inferensi yang menggunakan informasi ini untuk mencapai kesimpulan atau memberikan rekomendasi.</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <h4 class="fw-bold text-primary">Metode Certainty Factor</h4>
                <p>Metode certainty factor ialah salah satu konsep yang dimana dalam hal untuk akomodasi ketidak pastian terhadap suatu argumentasi ataupun pikiran dari seorang ahli.</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <h4 class="fw-bold text-primary">Penyakit</h4>
                <p>Penyakit ialah gangguan kesehatan yang mengganggu fungsi normal tubuh dan menyebabkan gejala yang tidak diinginkan. Penyakit bisa disebabkan oleh berbagai faktor, termasuk infeksi, keturunan, gaya hidup tidak sehat, atau lingkungan yang tidak sehat.</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <h4 class="fw-bold text-primary">Website</h4>
                <p>Website ialah suatu kumpulan tampilan web yang terintegrasi dan saling terhubung, membentuk akses portal dengan dashboard sebagai tampilan awal dan web page sebagai tampilan per halaman independent, pengguna dapat mengaksesnya melalui alamat atau link tertentu, Secara umum website mencakup seluruh tampilan web di bawah suatu domain, menyajikan informasi khusus atau umum sebagai referensi valid bagi pengguna.</p>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script>

</script>
@endsection