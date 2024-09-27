<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ISPA') }}</title>
    <link href="{{ asset('assets/backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .badge {
            padding: .5rem;
        }
        table tr th:last-child {
            width: 17.5%;
        }
    </style>
    @yield('css')
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ISPA</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ \Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Main Menu</div>
            <li class="nav-item {{ \Request::segment(2) == 'penyakit' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('penyakit.index') }}">
                    <i class="fas fa-fw fa-database"></i><span>Data Penyakit</span>
                </a>
            </li>
            <li class="nav-item {{ in_array(\Request::segment(2), ['gejala', 'nilai-cf']) ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseManagement"
                    aria-expanded="true" aria-controls="collapseManagement">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Management</span>
                </a>
                <div id="collapseManagement" class="collapse" aria-labelledby="headingManagement"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('gejala.index') }}">Gejala</a>
                        <a class="collapse-item" href="{{ route('nilai-cf.index') }}">Nilai CF</a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ \Request::segment(2) == 'edukasi' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('edukasi.index') }}">
                    <i class="fas fa-fw fa-graduation-cap"></i><span>Edukasi</span>
                </a>
            </li>
            <li class="nav-item {{ \Request::segment(2) == 'riwayat-diagnosa' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('riwayat-diagnosa.index') }}">
                    <i class="fas fa-fw fa-history"></i><span>Riwayat Diagnosa</span>
                </a>
            </li>
            <li class="nav-item {{ \Request::segment(2) == 'pengguna' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pengguna.index') }}">
                    <i class="fas fa-fw fa-database"></i><span>Data Pengguna</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session()->get('nama') }}</span>
                                <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name={{ session()->get('nama') }}&background={{ session()->get('color') }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="{{ route('beranda') }}"><i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>Beranda</a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST" id="uForm">
                                    @csrf
                                    <a class="dropdown-item" href="#" onclick="uForm.submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                @if (\Request::segment(2) == 'dashboard')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Gejala</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['gejala'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penyakit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['penyakit'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['user'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Edukasi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data['edukasi'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Diagnosa (Hari ini)</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('riwayat-diagnosa.index') }}">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table text-start align-middle table-bordered table-hover mb-0" id="dataTable">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th width="5%">No</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama</th>
                                                    <th>Penyakit</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['hasil'] as $key => $value)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $value['tanggal'] }}</td>
                                                    <td>{{ $value['nama_user'] }}</td>
                                                    <td>{{ $value['nama_penyakit'] }}</td>
                                                    <td>{{ $value['hasil_nilai'] }}</td>    
                                                </tr>    
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <?php
                        $arrTitle = explode('-', ucfirst(\Request::segment(2)));
                        $title = $arrTitle[0];
                        if (isset($arrTitle[1])) {
                            $arrTitle[1] = ucfirst($arrTitle[1]);
                            $title .= " $arrTitle[1]";
                        }
                    ?>
                    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
                </div>
                @yield('content')
            </div>
            @endif
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ISPA 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="{{ asset('assets/backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('assets/backend/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/backend/js/demo/chart-pie-demo.js') }}"></script>
    <script>

    </script>
    @yield('js')
</body>
</html>