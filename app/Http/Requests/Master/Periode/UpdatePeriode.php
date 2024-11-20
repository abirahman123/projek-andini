<?php

namespace App\Http\Requests\Master\Periode;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\JsonValidationResponse;

class UpdatePeriode extends FormRequest
{
    use JsonValidationResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'periode' => 'required|regex:/^\d{4}\/\d{4}$/',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'keterangan' => 'nullable|string|regex:/^[a-zA-Z0-9\s]+$/|alpha_num_spaces_with_alphabet_and_symbol'
        ];
    }

    public function messages(): array
    {
        return [
            'periode.required' => 'Periode harus di isi',
            'periode.regex' => 'Format periode harus berupa dua tahun yang dipisahkan oleh tanda "/" (slash), misalnya "2023/2024".',
            'tahun.required' => 'Tahun harus di isi',
            // 'tahun.unique' => 'Tahun sudah dipakai',
            'tahun.integer' => 'Tahun harus berisi angka',
            'tahun.min' => 'Tahun tidak boleh kurang 1900',
            'tahun.max' => 'Tahun tidak boleh lebih dari tahun saat ini',
            'explanation.string' => 'Keterangan harus berupa string',
            'explanation.alpha_spaces' => 'Keterangan hanya boleh huruf dan spasi',
            'explanation.regex' => 'Keterangan hanya boleh huruf dan angka',
            'explanation.alpha_num_spaces_with_alphabet_and_symbol' => 'Keterangan tidak boleh hanya angka atau simbol, paling tidak harus ada satu huruf',

        ];
    }
}
