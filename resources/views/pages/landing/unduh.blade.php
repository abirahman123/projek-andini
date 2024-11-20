@extends('layouts.guest')
@section('title', 'Unduh Dokumen')

@section('content')
@include('layouts.partials.hero', ['title' => "Unduh Dokumen <br/> pendukung nikah dini"])

<section class="d-flex justify-content-center align-items-center">
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                   <tr>
                        <th scope="col" class="text-center fw-bolder">NO</th>
                        <th scope="col" class="text-center fw-bolder">NAMA</th>
                        <th scope="col" class="text-center fw-bolder" >KETERANGAN</th>
                        <th scope="col" class="text-center fw-bolder" >FILE</th>
                        
                   </tr>         
                </thead>
                <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$post->nama}}</td>
                            <td>{{$post->keterangan}}</td>
                            <td><a href="{{ getFileInfo($post->file)["preview"]}}" class="btn btn-info btn-sm" target="_blank">Unduh</a></td>

                        
                        </tr>
                        @endforeach
                    
                    
                    {{-- @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->nama }}</td>
                            <td>{{ $post->keterangan }}</td>
                            
                            
                            @csrf
                        </tr>
                            @empty
                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
                            </div>
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection


            {{-- <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
    aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header p-4">
        <img src="{{asset("landing/images/logos/logo-erpl.svg")}}" alt="img-fluid" width="150">
    </div>
    <div class="offcanvas-body p-4">
        <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                    target="_blank">Alur Pendaftaran</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                    target="_blank">Jadwal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                    target="_blank">Biaya</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/unduh"
                    target="_blank">Unduh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                    target="_blank">FAQ</a>
            </li>
            <li class="nav-item">
                <div class="">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="btn fs-3 w-100 rounded py-2"
                    href="/login">Login</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-primary fs-3 w-100 rounded btn-hover-shadow py-2"
                    href="#">Mendaftar</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div> --}}
