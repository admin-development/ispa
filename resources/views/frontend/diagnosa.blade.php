@extends('welcome')

@section('css')
<style>
    #diagnosa {
        margin-top: 4rem;
    }
</style>
@endsection

@section("content")
<section id="diagnosa" class="diagnosa section">
    <div class="container section-title" data-aos="fade-up">
        @if (isset($data['gejala']))
            <h2>Hasil Diagnosa<br></h2>
        @else
            <h2>Diagnosa<br></h2>
        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                @if (isset($data['gejala']))
                <h4 class="text-start">Hasil Diagnosa</h4>
                <table class="table table-bordered align-middle table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Kode Gejala</th>
                            <th>Nama Gejala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['gejala'] as $key => $value)
                            <tr>
                                <td class="text-center" width="5%">{{ $key + 1 }}</td>
                                <td class="text-center" width="15%">{{ $value->nilai_cf->gejala->kode_gejala }}</td>
                                <td class="text-start">{{ $value->nilai_cf->gejala->nama_gejala }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered align-middle table-hover mb-0">
                    <thead>
                        <tr class="text-center">
                            <th>Kode Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Hasil</th>
                            <th>Solusi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['detail'] as $key => $value)
                            <tr>
                                <td class="text-center" width="15%">{{ $value['kode_penyakit'] }}</td>
                                <td width="20%">{{ $value['nama_penyakit'] }}</td>
                                <td class="text-center" width="10%">{{ $value['hasil_nilai'] }}</td>
                                <td class="text-start">{{ $value['solusi'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <small class="text-danger">*)<i> Hasil diagnosa ini masih memerlukan pemeriksaan lebih lanjut untuk mendapatkan hasil yang lebih akurat!</i></small>
                @else
                <h4 class="text-start">Pilih gejala yang anda alami dibawah ini!</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">
                                <input type="checkbox" id="allGejala" onchange="allGejala(this.checked)">
                            </th>
                            <th width="15%">Kode Gejala</th>
                            <th>Nama Gejala</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('diagnosa') }}" method="POST" id="formGejala">
                            @csrf
                            @foreach ($data as $key => $value)
                                <tr class="text-center">
                                    <td>
                                        <input type="checkbox" class="eachGejala" name="id_gejala[{{ $key }}]" value="{{ $value->id }}" onchange="eachGejala(this.checked)">
                                    </td>
                                    <td>{{ $value->kode_gejala }}</td>
                                    <td class="text-start">{{ $value->nama_gejala }}</td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary w-25" form="formGejala" onclick="submitDiagnosa();">Diagnosa</button>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    let list = document.getElementsByClassName('eachGejala');
    let parent = document.getElementById('allGejala');
    function allGejala(data) {
        if (data) {
            for (let item of list) {
                item.checked = true;
            }
        } else {
            for (let item of list) {
                item.checked = false;
            }
        }
    }
    function eachGejala(data) {
        let eGejalaLen = list.length;
        let eItem = 0;
        for (let item of list) {
            if (item.checked == true) { eItem += 1}
        }
        if (eItem == eGejalaLen) {
            parent.checked = true;
        } else {
            parent.checked = false;
        }
    }
    function submitDiagnosa() {
        let n = 0;
        for (let item of list) {
            if (item.checked) {
                n++;
            }
        }
        if (n < 1) {
            alert('Tidak ada gejala yang dipilih!');
            return event.preventDefault();
        }
    }
</script>
@endsection