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
            <form action="{{ route('pengguna.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" onkeypress="return noSpasi(event)">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <label for="no_hp">Nomor Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') }}" onkeypress="return justNum(event)">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary py-3 w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection