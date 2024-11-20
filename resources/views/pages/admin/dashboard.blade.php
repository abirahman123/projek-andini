@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3 mb-3">
            <div class="card border-0 zoom-in bg-light-info shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/icon-bar.svg') }}" width="50" height="50" class="mb-3"
                        alt="" />
                    <p class="fw-semibold fs-3 text-info mb-1">Total Pengajuan</p>
                    <h5 class="fw-semibold text-info mb-0">{{ $jumlah_pengajuan }}</h5>
                </div>
            </div>
        </div>
        <div class="col-3 mb-3">
            <div class="card border-0 zoom-in bg-light-danger shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/icon-favorites.svg') }}" width="50" height="50"
                        class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1">Total Pengajuan Disetujui</p>
                    <h5 class="fw-semibold text-primary mb-0">{{ $jumlah_jadwal }}</h5>
                </div>
            </div>
        </div>
        <div class="col-3 mb-3">
            <div class="card border-0 bg-light-primary shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/icon-dd-date.svg') }}" width="50" height="50"
                        class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1">Jadwal Asesmen</p>
                    <h5 class="fw-semibold text-primary mb-0">{{ $jumlah_jadwal }}</h5>
                </div>
            </div>
        </div>
        <div class="col-3 mb-3">
            <div class="card border-0 zoom-in bg-light-success shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/icon-account.svg') }}" width="50" height="50"
                        class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-success mb-1">Asesor</p>
                    <h5 class="fw-semibold text-success mb-0">{{ $jumlah_data }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-11">
            <!-- Grafik Pengajuan Dispensasi Nikah per Kecamatan -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Pengajuan Dispensasi Nikah per Kecamatan</h5>
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-md-12">
                            <canvas id="grafikPengajuanPerKecamatan" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <!-- Jadwal Asesment Terdekat -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Asesment Terdekat</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal Asesmen</th>
                                <th>Catatan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal->sortBy('tanggal_asesmen')->take(5) as $jadwal)
                                <tr>
                                    <td>{{ $jadwal->tanggal_asesmen }}</td>
                                    <td>{{ $jadwal->catatan }}</td>
                                    <td>{{ $jadwal->status }}</td>
                                    <td>{{ $jadwal->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <ul id="jadwalAsesmentList"></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row flex-row justify-content-center mt-4">
        @if ($news->isEmpty())
            <div class="alert alert-info" role="alert">
                No news available.
            </div>
        @else
            @foreach ($news as $index => $newsItem)
                <div class="card latest-news-card col-3 m-2">
                    <img src="{{ $newsItem->image_url }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h2>{{ $newsItem->title }}</h2>
                        <p>
                            <span id="dots{{ $index }}">{{ Str::limit($newsItem->description, 10) }}</span>
                            <span id="more{{ $index }}" style="display: none;">{{ $newsItem->description }}</span>
                        </p>
                        <button
                            onclick="toggleReadMore('{{ 'dots' . $index }}', '{{ 'more' . $index }}', '{{ 'myBtn' . $index }}')"
                            id="{{ 'myBtn' . $index }}">Read more</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script src="{{ asset('assets/js/chart.umd.js') }}"></script>
    <script>
        var jumlahPengajuanPerKecamatan = <?php echo json_encode($jumlah_pengajuan_per_kecamatan ?? []); ?>;
        var namaKecamatan = JSON.parse(<?php echo json_encode($nama_kecamatan); ?>);

        var pengajuanDict = {};
        jumlahPengajuanPerKecamatan.forEach(function(item) {
            pengajuanDict[item.kecamatan_id] = item.jumlah_pengajuan;
        });

        // Buat label dan data untuk semua kecamatan
        var kecamatanLabels = [];
        var jumlahPengajuan = [];

        namaKecamatan.forEach(function(kec) {
            kecamatanLabels.push(kec.nama_kecamatan);
            // Jika ada data pengajuan untuk kecamatan ini, gunakan data tersebut, jika tidak, gunakan 0
            jumlahPengajuan.push(pengajuanDict[kec.id] || 0);
        });

        // Buat grafik menggunakan Chart.js
        var ctx = document.getElementById('grafikPengajuanPerKecamatan').getContext('2d');
        var grafikPengajuan = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: kecamatanLabels,
                datasets: [{
                    label: 'Jumlah Pengajuan per Kecamatan',
                    data: jumlahPengajuan,
                    backgroundColor: 'rgba(0, 0, 255, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        function toggleReadMore(dotsId, moreId, btnId) {
            var dots = document.getElementById(dotsId);
            var moreText = document.getElementById(moreId);
            var btnText = document.getElementById(btnId);

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
@endsection

@push('scripts')
@endpush
