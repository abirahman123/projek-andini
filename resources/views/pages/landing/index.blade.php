@extends('layouts.guest')
@section('title', 'Beranda')

@push('css')
  <style>
    .hero-section {
      min-height: 100vh;
    }

    img {
      max-width: 100%;
      height: 100%;
    }
  </style>
@endpush

@section('content')
  <div class="body-wrapper overflow-hidden">
    <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-11">
      <div class="container">
        <div class="owl-carousel">
          <div class="row align-items-center flex-column-reverse flex-sm-row">
            <div class="col-sm-6">
              <div class="hero-content my-11 my-xl-0">
                <div class=" d-grid gap-1 mb-2 ">
                  <h1 class="fw-bolder fs-13 " data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">Andini App
                  </h1>
                  <p class="fs-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                    Solusi untuk anda yang ingin menikah dini, dengan sertifikasi
                    resmi dan yang pasti aman dari polisi</p>
                </div>
                <div class="d-sm-flex align-items-center gap-3 z-index-1 mt-4" data-aos="fade-up" data-aos-delay="800"
                  data-aos-duration="1000">
                  <a class="btn d-flex btn-primary btn-hover-shadow d-block mb-3 mb-sm-0" href="#">
                    <img src="{{ asset('landing/images/svgs/ph_sign-in-bold.svg') }}" alt="img-fluid" class="mx-2">
                    <span>Mendaftar</span>

                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6" data-aos="fade-left" data-aos-duration="1000">
              <img src="{{ asset('assets/images/ilustrations/marriage.webp') }}" class="img-fluid">
            </div>
          </div>
          @foreach ($slideshowitems as $slideshowItem)
            <div class="row align-items-center flex-column-reverse flex-sm-row">
              <div class="col-sm-6">
                <div class="hero-content my-11 my-xl-0">
                  <div class=" d-grid gap-1 mb-2 ">
                    <h1 class="fw-bolder fs-13 " data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                      {{ $slideShowItem->title }}
                    </h1>
                    <p class="fs-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                      {{ $slideShowItem->caption }}</p>
                  </div>

                </div>
              </div>
              <div class="col-sm-6" data-aos="fade-left" data-aos-duration="1000">
                <img src="{{ getFileInfo($slideshowItem->image)['preview'] }}" class="img-fluid">
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>
    <section class="statistik pb-md-10 pb-14 position-relative " oncontextmenu="return false;">
      <img src="{{ asset('landing/images/svgs/acc-1.svg') }}" alt=""
        class=" position-absolute end-0  d-none d-lg-block z-index-0" style="top: 25%">
      <img src="{{ asset('landing/images/svgs/acc-2.svg') }}" alt=""
        class=" position-absolute d-none d-lg-block  z-index-0" style="bottom:0; left:-15%;">
      <div class="container d-flex flex-column justify-content-center align-items-center">
        <h1 class="pt-5 fw-bolder fs-12 text-white " data-aos="fade-up" data-aos-duration="1000">Data Statistik
          Terkini</h1>
        <p class="text-white fs-4 fw-medium text-center" data-aos="fade-up" data-aos-duration="1000">Update animo
          pendaftar dan peserta yang telah lolos administrasi</p>
      </div>
      <div class="position-relative my-4 m-md-5">
        <img src="{{ asset('landing/images/svgs/grid.svg') }}" class="position-absolute d-block z-index-0"
          style="left: 40%;" alt="grid icon" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
          <div class="d-flex flex-column gap-md-5 gap-2">
            <div class="d-flex flex-md-row flex-column gap-4 justify-content-between">
              <div class="container m-md-0 w-md w-md-max p-0 col-4" data-aos="fade-left" data-aos-duration="1000"
                data-aos-delay="600">
                <div class="container d-flex justify-content-center">
                  <img src="{{ asset('landing/images/svgs/gender.svg') }}" class="img-fluid w-75" alt="location-icon">
                </div>
                <p class="mt-4 fw-medium text-white">Anda juga dapat melihat perolehan data balita terkini <span
                    class="fw-bolder">berdasarkan jenis kelamin</span> di seluruh kecamatan di Kabupaten Blitar secara
                  real-time.</p>
              </div>
              <div class="card d-flex flex-column  gap-4 align-items-center justify-content-center" data-aos="fade-right"
                data-aos-duration="1000" data-aos-delay="200">
                <div class="card-body">
                  <h5 class="me-auto mb-3">Data catin Berdasarkan Jenis Kelamin</h5>
                  <div id="catin_jk_chart"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column mt-10 gap-md-5 gap-2  ">
            <div class="d-flex flex-md-row flex-column-reverse gap-4 justify-content-between">
              <div class="d-flex flex-column  card  gap-4 align-items-center" data-aos="fade-left"
                data-aos-duration="1000" data-aos-delay="200">
                <div class="card-body">
                  <h5 class="me-auto mb-3">Data catin di setiap kecamatan berdasarkan jenis kelamin</h5>
                  <div id="catin_kecamatan_chart"></div>
                </div>
              </div>
              <div class="container m-md-0 w-md w-md-max p-0 col-4" data-aos="fade-right" data-aos-duration="1000"
                data-aos-delay="600">
                <div class="container d-flex justify-content-center">
                  <img src="{{ asset('landing/images/svgs/distance.svg') }}" class="img-fluid w-75"
                    alt="location-icon">
                </div>
                <p class="mt-4 fw-medium text-white">Anda dapat melihat perolehan data balita terkini <span
                    class="fw-bolder">di
                    seluruh
                    desa</span> di setiap kecamatan berdasarkan jenis kelamin secara real-time.</p>
              </div>

            </div>
          </div>
        </div>

      </div>

    </section>

    <section class="pt-md-14 pt-15" id="alur">
      <div class="container d-flex flex-column">
        <div class="d-flex flex-md-row flex-column justify-content-center gap-3 ">
          <div class="d-flex flex-column col-md-8" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="col-md-8 fw-semibold fs-12 text-start" style="color: #232933;">Alur Pendaftaran
              Pasangan</h1>
            <p class="fw-normal fs-4" style="color: #A6A6A6;">Setiap pendaftar harus mengikuti langkah-langkah
              berikut, agar nantinya dapat menerima sertifikat nikah pada akhirnya</p>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-self-center" data-aos="fade-left"
            data-aos-duration="1000">
            <div class="">
              <a class="btn btn-outline-primary " href="#"><i class="mx-3"><img
                    src="{{ asset('landing/images/svgs/icon-download.svg') }}" alt="img-fluid"></i>
                Download Panduan & Juknis</a>
            </div>
          </div>
        </div>
        <div class="d-flex flex-md-row flex-column mt-5 justify-content-center gap-2" data-aos="fade"
          data-aos-duration="1000">
          <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/images/ilustrations/step.webp') }}" alt="step-ilustration">
          </div>
          <div class="col-md-6 d-flex flex-column gap-4 justify-content-center">
            <div class="d-flex flex-row gap-2">
              <div class="pt-1">
                <img src="{{ asset('landing/images/svgs/tree-structure.svg') }}" alt="network-icon"
                  style="width: 25px;height:25px; max-width: unset;">
              </div>
              <div class="d-flex flex-column">
                <h1 class="fw-semibold fs-6" style="color: #232933;">Registrasi</h1>
                <p class="col-10 fw-normal fs-3 mt-2" style="color: #A6A6A6;">Calon pengantin yang mengajukan dispensasi
                  nikah mendaftarkan diri dengan mengisi form pendaftaran
                </p>
              </div>
            </div>
            <div class="d-flex flex-row gap-2">
              <div class="pt-1">
                <img src="{{ asset('landing/images/svgs/tree-structure.svg') }}" alt="network-icon"
                  style="width: 25px;height:25px; max-width: unset;">
              </div>
              <div class="d-flex flex-column">
                <h1 class="fw-semibold fs-6" style="color: #232933;">Mengajukan dispensasi nikah dini</h1>
                <p class="fw-normal fs-3 mt-2" style="color: #A6A6A6;">calon pengantin mengajukan dispensasi nikah
                  dengan mengisikan identitas calon pengantin putra & putri
                </p>
              </div>
            </div>
            <div class="d-flex flex-row gap-2">
              <div class="pt-1">
                <img src="{{ asset('landing/images/svgs/tree-structure.svg') }}" alt="network-icon"
                  style="width: 25px;height:25px; max-width: unset;">
              </div>
              <div class="d-flex flex-column">
                <h1 class="fw-semibold fs-6" style="color: #232933;">Melengkapi berkas persyaratan</h1>
                <p class="fw-normal fs-3 mt-2" style="color: #A6A6A6;">calon pengantin melengkapi berkas persyaratan
                  masing-masing catin (putra & putri)
                </p>
              </div>
            </div>
            <div class="d-flex flex-row gap-2">
              <div class="pt-1">
                <img src="{{ asset('landing/images/svgs/tree-structure.svg') }}" alt="network-icon"
                  style="width: 25px;height:25px; max-width: unset;">
              </div>
              <div class="d-flex flex-column">
                <h1 class="fw-semibold fs-6" style="color: #232933;">Proses Asesmen</h1>
                <p class="fw-normal fs-3 mt-2" style="color: #A6A6A6;"> Pasangan calon pengantin didampingi wali
                  menghadiri sesi asesmen yang telah dijadwalkan dinas
                </p>
              </div>
            </div>
            <div class="d-flex flex-row gap-2">
              <div class="pt-1">
                <img src="{{ asset('landing/images/svgs/tree-structure.svg') }}" alt="network-icon"
                  style="width: 25px;height:25px; max-width: unset;">
              </div>
              <div class="d-flex flex-column">
                <h1 class="fw-semibold fs-6" style="color: #232933;">Unduh surat dispensasi Nikah</h1>
                <p class="fw-normal fs-3 mt-2" style="color: #A6A6A6;"> Pasangan calon pengantin mengunduh surat
                  dispensasi nikah yang telah dilakukan asesmen

                </p>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="mt-12 mb-12">
      <div class="container d-flex flex-md-row flex-column align-items-center justify-content-between">
        <div class="d-flex justify-content-center" data-aos="fade-right" data-aos-duration="1000">
          <img src="{{ asset('assets/images/ilustrations/requirement.png') }}" alt="">
        </div>
        <div class="d-flex flex-column gap-2 theSyarat-title col-md-4 mx-5  mx-md-0" data-aos="fade-left"
          data-aos-duration="1000">
          <h1 class="fw-semibold fs-12 text-start" style="color: #232933;">Persyaratan Umum</h1>
          <p class="fw-medium fs-4 text-start" style="color: #A6A6A6;">Selain persyaratan umum tersebut,
            Pendaftar harus memenuhi syarat khusus</p>
          <div class="d-flex flex-column gap-3">
            <div class="d-flex flex-row gap-3 theSyarat-list">
              <img src="{{ asset('landing/images/svgs/Check-Circle.svg') }}" alt="img-fluid"
                style="width: 25px; height: 25px;" class="">
              <p class="col-8 fw-normal fs-4 text-start m-0" style="color: #232933;">Warga Negara Indonesia
                (WNI)</p>
            </div>
            <div class="d-flex flex-row gap-3 theSyarat-list">
              <img src="{{ asset('landing/images/svgs/Check-Circle.svg') }}" alt="img-fluid"
                style="width: 25px; height: 25px;" class="">
              <p class="fw-normal fs-4 text-start m-0" style="color: #232933;">Pada saat mendaftar, calon
                peserta berumur maksimal 18 tahun</p>
            </div>
            <div class="d-flex flex-row gap-3 theSyarat-list">
              <img src="{{ asset('landing/images/svgs/Check-Circle.svg') }}" alt="img-fluid"
                style="width: 25px; height: 25px;" class="">
              <p class="fw-normal fs-4 text-start m-0" style="color: #232933;">Memiliki Pasangan</p>
            </div>
            <div class="d-flex flex-row gap-3 theSyarat-list">
              <img src="{{ asset('landing/images/svgs/Check-Circle.svg') }}" alt="img-fluid"
                style="width: 25px; height: 25px;" class="">
              <p class="fw-normal fs-4 text-start m-0" style="color: #232933;">Sehat Akal dan fikiran</p>
            </div>
            <div class="d-flex flex-row gap-3 theSyarat-list">
              <img src="{{ asset('landing/images/svgs/Check-Circle.svg') }}" alt="img-fluid"
                style="width: 25px; height: 25px;" class="">
              <p class="fw-normal fs-4 text-start m-0" style="color: #232933;">Mengisi Formulir Pendaftaran
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="my-12" id="faq">
      <div class="container d-flex flex-column theFAQ " data-aos="fade" data-aos-duration="1000">
        <h1 class="fw-semibold fs-12 text-center mb-8">FaQ Andini App</h1>
        <div class="col-md-8 align-self-center pt-3 mx-2 mx-md-0">
          <div class="accordion accordion-flush" id="accordionExample">
            @foreach ($faqs as $i => $faq)
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-{{$faq->id}}">
                  <button class="accordion-button accFAQ" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-{{$faq->id}}" @if($i == 0) aria-expanded="true" @endif aria-controls="collapseOne">
                    {{ $faq->question }}
                  </button>
                </h2>
                <div id="collapse-{{$faq->id}}" class="accordion-collapse collapse @if($i == 0) show @endif accFAQdes" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    {{ $faq->answer }}
                  </div>
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </div>
    </section>

  </div>
  <footer class="footer-part pt-8 pb-5">
    <div class="container">

    </div>
  </footer>
  <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
    aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header p-4">
      <img src="{{ asset('landing/images/logos/logo-erpl.svg') }}" alt="img-fluid" width="150">
    </div>
    <div class="offcanvas-body p-4">
      <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" target="_blank">Alur Pendaftaran</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" target="_blank">Jadwal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" target="_blank">Biaya</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/unduh" target="_blank">Unduh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" target="_blank">FAQ</a>
        </li>
        <li class="nav-item">
          <div class="">
            <ul class="navbar-nav">
              <li class="nav-item ">
                <a class="btn fs-3 w-100 rounded py-2" href="/login">Login</a>
              </li>
              <li class="nav-item ms-2">
                <a class="btn btn-primary fs-3 w-100 rounded btn-hover-shadow py-2" href="#">Mendaftar</a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>

@endsection

@push('scripts')
  <script>
    $(function() {
      function getChartPayload(uri) {
        return $.ajax({
          async: true,
          url: uri,
          type: "GET",
        })
      }

      // chart balita berdasarkan jk
      getChartPayload("/chart?name=catin&group=jenis_kelamin").done(function(data) {
        const charta = new ApexCharts(document.querySelector("#catin_jk_chart"), {
          chart: {
            type: 'donut',
            width: 480,
          },
          plotOptions: {
            pie: {
              expandOnClick: true,
              donut: {
                labels: {
                  show: true,
                  total: {
                    show: true,
                    showAlways: true,
                    label: 'Total Catin',
                    // fontSize: 'px',
                    color: '#000',
                    formatter: function(w) {
                      return w.globals.seriesTotals.reduce((a, b) => {
                        return a + b
                      }, 0)
                    }
                  }
                }
              }
            }
          },

          series: data.data.series,
          labels: data.data.categories,
          responsive: [{
            breakpoint: 600,
            options: {
              chart: {
                width: 300
              },
              legend: {
                position: 'bottom'
              }
            }
          }]

        });
        charta.render();
      })

      // chart balita berdasarkan kecamatan
      getChartPayload("/chart?name=catin&group=kecamatan").done(function(data) {
        // console.log(data);
        const series = data.data.series;
        const formattedSeries = Object.keys(series).map((key) => {
          return {
            name: key,
            data: series[key]
          }
        })
        const charta = new ApexCharts(document.querySelector("#catin_kecamatan_chart"), {
          series: formattedSeries,
          chart: {
            type: 'bar',
            width: 600,
            height: 350,
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: data.data.categories,
          },
          yaxis: {
            title: {
              text: 'Jumlah catin'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " Catin"
              }
            }
          },
          responsive: [{
            breakpoint: 600,
            options: {
              chart: {
                width: 300
              },
              legend: {
                position: 'bottom'
              }
            }
          }]
        });
        charta.render();
      })
    })


    // })
  </script>
@endpush
