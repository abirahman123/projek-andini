<?php

namespace App\Http\Requests\Users\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:roles,name,'.$this->role?->id,
            'guard_name' => 'required',
        ];
    }
}
