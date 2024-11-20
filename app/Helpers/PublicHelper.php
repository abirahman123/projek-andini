<?php

use App\Models\Setting\SiteSetting;
use App\Models\Setting\SystemSettingModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

if (!function_exists('getSetting')) {

    function getSetting(string $key, mixed $defaultValue = null): string
    {
        $setting = SystemSettingModel::where([
            "is_active" => "1",
            "name" => $key
        ])->first();
        if ($setting) {
            return $setting->value;
        } else {
            return $defaultValue;
        }
    }
}

if(!function_exists("getSiteSetting")){
    function siteSetting(string $key, mixed $defaultValue = null): string
    {
        $setting = SiteSetting::where([
            "name" => $key
        ])->first();
        if ($setting) {
            return $setting->value;
        } else {
            return $defaultValue;
        }
    }
}

if (!function_exists('c_option')) {
    /**
     * c_options
     * fungsi untuk mengconvert collection ke array untuk custom select
     * @return Array
     */
    function c_option(Collection| Model $data, ?String $labelCol = "name", String $valCol="id"): array
    {
        if ($data instanceof Model) {
            $d =  collect([$data])->pluck( $labelCol, $valCol)->all();
            return $d;
        }
        $d = $data->pluck($labelCol, $valCol)->all();

        return $d;
    }
}

if (!function_exists('c_value')) {
    /**
     * c_value
     * fungsi untuk mengconvert model atau array ke select value
     * @return array
     */
    function c_value(string $id, string $source, ?String $labelCol = "name", String $valCol="id"): array
    {
        $d = $source::where($valCol, $id)->first();
        if (!$d) {
            return [
                'v' => '',
                't' => ''
            ];
        }
        return [
            'v' => $d->$valCol,
            't' => $d->$labelCol
        ];
    }
}


function humanFileSize(int $size, $precision = 1) {
    $units = array('B','KB','MB','GB','TB');
    $step = 1024;
    $i = 0;
    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $precision) . ' ' . $units[$i];
}

function makeEllipsis(string $str,int $maxLength):string{
    return substr($str,0,$maxLength)."...";
}

if (!function_exists("getFileInfo")) {
    function getFileInfo(string $path, string $disk = 'public'): array
    {
        $storage = Storage::disk($disk);
        if (!$storage->exists($path)) {
            return [];
        }
        $fileInfo = pathinfo($storage->path($path));
        $size = filesize($storage->path($path));
        $res['preview'] = Storage::url($path);
        $res['path'] = $path;
        $res['size'] = humanFileSize($size);
        $res['filename'] = makeEllipsis($fileInfo['filename'],20).".".$fileInfo['extension'];
        return $res;
    }
}


if (!function_exists("formatDateFromDatabase")) {
    /**
     * Format date time
     *
     * @param string|null $date Original date from database
     * @param string $toFormat Format to be displayed (default: 'd F Y H:i')
     * @param bool $diff Show difference from now (default: false)
     * @return array|null
     */
    function formatDateFromDatabase(string|null $date, string $toFormat = 'd F Y H:i', bool $diff = true): array|null
    {
        if ($date == null) {
            return null;
        }

        $formattedDate = \Carbon\Carbon::parse($date)->format($toFormat);
        $diffDate = $diff ? \Carbon\Carbon::parse($date)->diffForHumans() : "";
        return [
            'formatted' => $formattedDate,
            'diff' => $diffDate
        ];
    }
}

if (!function_exists('formatCurrency')) {
    function formatCurrency($amount)
    {
        $formatted_amount = number_format($amount, 2, ',', '.');

        return 'Rp. ' . $formatted_amount;
    }
}
