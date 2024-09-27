@extends("dashboard")

@section('css')
<style>
    
</style>
@endsection

@section("content")
<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6 class="m-0">Data User</h6>
            <a href="{{ route('pengguna.index') }}" class="badge bg-primary text-light">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('pengguna.update', $data->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="form-floating">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ old('nama', $data->nama) }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username', $data->username) }}" onkeypress="return noSpasi(event)">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-10">
                        <div class="form-floating">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" disabled>
                        </div>
                    </div>
                    <div class="col-2 d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" onclick="isOn(this.checked)">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="form-floating">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp', $data->no_hp) }}" onkeypress="return justNum(event)">
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
    function isOn(v) {
        let formPwd = $('#password');
        if (v) {
            formPwd.attr('name','password');
            formPwd.removeAttr('disabled');
        } else {
            formPwd.attr('disabled','disabled');
            formPwd.removeAttr('name');
        }
    }
</script>
@endsection