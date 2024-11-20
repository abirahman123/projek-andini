@php
    $color = 'light text-dark';
    $text = 'Belum Diunggah';
    if (isset($data)) {
        if ($data == 'SUBMITTED') {
            $color = 'info';
            $text = 'Menunggu Persetujuan';
        } elseif ($data == 'APPROVED') {
            $color = 'success';
            $text = 'Disetujui';
        } elseif ($data == 'REJECTED') {
            $color = 'danger';
            $text = 'Ditolak';
        } elseif ($data == 'REVISED') {
            $color = 'warning';
            $text = 'Perlu Revisi';
        }
    }
@endphp

<span class="badge bg-{{ $color }}">{{ $text }}</span>
