@extends('welcome')

@section('css')
<style>
    p {
        text-align: justify;
        text-justify: inter-word;
    }
    #about {
        margin-top: 4rem;
    }
</style>
@endsection

@section("content")
<section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
    </div>
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>Pengertian Rancang Bangun sistem</h3>
                <p>Rancang bangun sistem merupakan Rancang bangun sistem adalah suatu proses yang melibatkan perencanaan, pengembangan, dan penerapan sebuah sistem secara keseluruhan, mulai dari identifikasi kebutuhan hingga implementasi.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <h3>Pengertian Sistem Pakar</h3>
                <p>Sistem pakar ialah sebuah program komputer yang dirancang untuk meniru kemampuan pengambilan keputusan seorang ahli dalam bidang tertentu.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>Metode <i>Centainty Factor</i></h3>
                <p>Metode certainty factor ialah salah satu konsep yang dimana dalam hal untuk akomodasi ketidak pastian terhadap suatu argumentasi ataupun pikiran dari seorang ahli, sebagai analoginya adalah ketika seorang ahli yang setiap saat melakukkan analisa informasi yang dengan ungkapan kepada ketidakpastian maka digunakan metode ini.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <h3>Pengertian ISPA</h3>
                <p>Penyakit ISPA adalah kondisi medis yang disebabkan oleh infeksi pada saluran pernapasan, meliputi hidung, tenggorokan, bronkus, hingga paru-paru. ISPA dapat disebabkan oleh berbagai jenis mikroorganisme seperti virus, bakteri, atau jamur.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>Pengertian Website</h3>
                <p>Website ialah suatu kumpulan tampilan web yang terintegrasi dan saling terhubung, membentuk akses portal dengan dashboard sebagai tampilan awal dan web page sebagai tampilan per halaman independent, pengguna dapat mengaksesnya melalui alamat atau link tertentu.</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>

</script>
@endsection