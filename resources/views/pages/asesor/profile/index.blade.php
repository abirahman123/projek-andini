@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand-active" href="#">Profile</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Security</a>
                        </li>
                    </ul>
                     <a href="{{ url('/profile/edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($asesorProfile)
                            <div class="row">
                                <div class="col-md-12 text-start mb-4">
                                    <img src="{{ asset('assets/images/profile/user-8.jpg') }}" alt="Profile Picture"
                                        style="border-radius: 50%; width: 100px; height: 100px;"><br><br>
                                </div>
                                <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>Nama:</strong><br>
                                            {{ $asesorProfile->nama }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Email:</strong><br>
                                            {{ $asesorProfile->email }}
                                        </div>
                                    </div><br>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>Jenis Kelamin:</strong><br>
                                            {{ $asesorProfile->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Nomor HP:</strong><br>
                                            {{ $asesorProfile->nomor_hp }}
                                        </div>
                                    </div><br>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>Status:</strong><br>
                                            {{ $asesorProfile->status == '1' ? 'Aktif' : 'Nonaktif' }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Alamat:</strong><br>
                                            {{ $asesorProfile->alamat }}
                                        </div>
                                    </div><br>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>Kecamatan:</strong><br>
                                            {{ $asesorProfile->kecamatan_id }}
                                        </div>
                                        <div class="col-md-6">
                                            <strong>Kelurahan:</strong><br>
                                            {{ $asesorProfile->kelurahan_id }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Data asesor tidak ditemukan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection
