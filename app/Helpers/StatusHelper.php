<?php

namespace App\Helpers;

class StatusHelper
{
    public static function formatStatus($status)
    {


        $status = self::checkStatus($status);
        return '<span class="badge bg-' . $status['badgeClass'] . '">' . $status['statusText'] . '</span>';
    }

    public static function checkStatus($status)
    {
        $statusText = '';
        $badgeClass = '';
        switch ($status) {
            case 'SUBMITTED':
                $statusText = 'Menunggu Persetujuan';
                $badgeClass = 'primary';
                break;
            case 'REVISED':
                $statusText = 'Perlu Revisi';
                $badgeClass = 'warning';
                break;
            case 'APPROVED':
                $statusText = 'Disetujui';
                $badgeClass = 'success';
                break;
            case 'REJECTED':
                $statusText = 'Ditolak';
                $badgeClass = 'danger';
                break;
            default:
                $statusText = '-';
                $badgeClass = 'secondary';
        }
        return ['statusText' => $statusText, 'badgeClass' => $badgeClass];
    }
}
