@extends('layouts.app')

@section('content')
    @php
        $widgetData = app(\App\Http\Controllers\WidgetController::class)->getWidgetData();
    @endphp

    <div class="row">
        <div class="col-3 mb-3">
            <div class="card border-0 zoom-in bg-light-info shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/icon-bar.svg') }}" width="50" height="50" class="mb-3"
                        alt="" />
                    <p class="fw-semibold fs-3 text-info mb-1">Pengajuan Dispensasi</p>
                    <h5 class="fw-semibold text-info mb-0">{{ $widgetData['jumlah_pengajuan'] }}</h5>
                </div>
            </div>
        </div>
        <div class="col-3 mb-3">
            <div class="card border-0 zoom-in bg-light-danger shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/success.svg') }}" width="50" height="50" class="mb-3"
                        alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1">Total Pengajuan Disetujui</p>
                    <h5 class="fw-semibold text-primary mb-0">{{ $widgetData['jumlah_disetujui'] }}</h5>
                </div>
            </div>
        </div>
        <div class="col-3 mb-3">
            <div class="card border-0 zoom-in bg-light-danger shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/danger.svg') }}" width="50" height="50" class="mb-3"
                        alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1">Total Pengajuan Ditolak</p>
                    <h5 class="fw-semibold text-primary mb-0">{{ $widgetData['jumlah_ditolak'] }}</h5>
                </div>
            </div>
        </div>
        <div class="col-3 mb-3">
            <div class="card border-0 zoom-in bg-light-danger shadow-none">
                <div class="card-body text-center">
                    <img src="{{ asset('assets/images/svgs/warning.svg') }}" width="50" height="50" class="mb-3"
                        alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1">Total Pengajuan Direvisi</p>
                    <h5 class="fw-semibold text-primary mb-0">{{ $widgetData['jumlah_direvisi'] }}</h5>
                </div>
            </div>
        </div>

    </div>
@endsection
