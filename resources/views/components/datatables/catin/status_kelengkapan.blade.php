@php
    $color = 'success';
    $text = 'Lengkap';

    if (isset($data)) {
        if (!$data->catin_pria?->isBerkasLengkap()) {
            $color = 'danger';
            $text = 'Belum Lengkap';
        }
        if (!$data->catin_wanita?->isBerkasLengkap()) {
            $color = 'danger';
            $text = 'Belum Lengkap';
        }
    }
@endphp

<span class="badge bg-{{ $color }}">{{ $text }}</span>
