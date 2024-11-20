<?php

namespace App\Http\Requests\Setting\SiteSetting;

use App\Traits\JsonValidationResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteSettingStoreRequest extends FormRequest
{
    use JsonValidationResponse, SoftDeletes;

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {

        return [
            'type' => 'required|in:site-identity,hero,profile',
            'name' => [
                'required',
                'min:3',
                'max:200',
                'alpha_dash_only',
                'unique:site_settings,name,' . $this->site_setting?->id
            ],
            'value' => 'required|min:1|max:255',
            'description' => 'nullable',
        ];
    }
}
