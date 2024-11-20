@php
$color = 'secondary';
$text = 'Tidak Diketahui';
if (isset($data)) {
    if ($data == 'SUBMITTED') {
        $color = 'warning';
        $text = 'Menunggu Persetujuan';
    } elseif ($data == 'APPROVED') {
        $color = 'success';
        $text = 'Disetujui';
    } elseif ($data == 'REJECTED') {
        $color = 'danger';
        $text = 'Ditolak';
    }
}
@endphp

<span class="badge bg-{{ $color }}">{{ $text }}</span>
