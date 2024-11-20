@extends('layouts.guest')
@section('title', 'Detail Berita')

@section('content')
    <section class="container">
        <article class="row justify-content-center">
            <div class="px-3 col-lg-8">
                <div class="container">
                    <div class="my-4">
                        <a href="{{ route('news') }}" style="background-color:var(--bs-andini1); "
                            class="rounded-circle text-white px-2 me-2 py-2 ti ti-chevron-left px-1"></a>
                        Kembali
                    </div>
                    <h2 class="my-3">{{ $detailNews->title }}</h2>
                    <p style="font-size:12px" class="pb-3">
                        <span class="px-2"><i style="font-size: 18px;"
                                class="ti ti-user px-1"></i>{{ $detailNews->Author->name }}</span>
                        <span class="px-2"><i style = "font-size: 18px;"
                                class="ti ti-calendar-time px-1"></i><?php echo substr($detailNews->created_at, 0, 10); ?></span>
                        <span class="px-2"><i style = "font-size: 18px;"
                                class="ti ti-clock px-1"></i><?php echo substr($detailNews->created_at, 11, 5); ?></span>
                    </p>
                    <div class="my-3">
                        <img src="{{ getFileInfo($detailNews->image_url)['preview'] }}" class="card-img-top" alt="...">

                        <div class="fs-4 px-2">
                            <p style="width:500px">{!! $detailNews->description !!}</p>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="card rounded-0 mt-4 ">
                    <div class="container p-4">

                        <h4 class ="text-black-60 fw-bold">Trending</h4>
                        <hr class ="m-0"
                            style = "background: linear-gradient(to right, var(--bs-andini1), var(--bs-andini3)); height:3px; border:none; opacity: 1;">
                        @foreach ($newsNew as $n)
                            <div class="card bg-transparent my-4" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ getFileInfo($n->image_url)['preview'] }}"
                                            class="img-fluid h-100 rounded-start" alt="..">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="m-0 p-2 card-body">
                                            <h5 class="card-title fs-2"><a class ="a-news"
                                                    href="{{ route('news.detail', $n->id) }}">{{ $n->title }}</a></h5>
                                            <p class="m-0">
                                                <span class ="fs-1"><i style = "font-size: 12px;"
                                                        class="ti ti-user px-2 text-black fw-bold "></i>{{ $n->Author->name }}</span>
                                                <span class ="fs-1"><i style = "font-size: 12px;"
                                                        class="ti ti-calendar-time px-2 text-black fw-bold"></i><?php echo substr($n->created_at, 0, 10); ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <h4 class ="text-black-60 fw-bold mt-5">Categories</h4>
                        <hr class ="m-0"
                            style = "background: linear-gradient(to right, var(--bs-andini1), var(--bs-andini3)); height:3px; border:none; opacity: 1;">
                        <div class="card bg-transparent my-3" style="box-shadow:none;">
                            <div class="card-body p-2 bg-transparent d-flex flex-wrap ">
                                @foreach ($kategoriNews as $kn)
                                    <a href="{{ route('news.kategori', $kn->id) }}"
                                        class=" a-newsKategori  px-4 py-2 mx-1 my-2">{{ $kn->name }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </article>

    </section>
@endsection
