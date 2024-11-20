<?php

namespace App\Http\Requests\Setting\Backup;

use Illuminate\Foundation\Http\FormRequest;

class StoreBackupDbRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->method  == "PUT") {
            return [
                'name' => 'required|string|max:255|unique:backup_schedules,name,' . $this->backupSchedule->id,
                'frequency' => 'required|in:daily,weekly,monthly',
                'time' => 'required',
                'tables' => 'required|array',
            ];
        }
        return [
            'name' => 'required|string|max:255|unique:backup_schedules,name',
            'frequency' => 'required|in:daily,weekly,monthly',
            'time' => 'required',
            'tables' => 'required|array',
        ];
    }
}
