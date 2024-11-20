<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMenuRequest extends FormRequest
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

      //  'nullable|max:200|unique:menus,module,' . $this->menu?->id
        return [
            'name' => 'required|max:200',
            'module' => [
                'required',
                'max:200',
                'unique:menus,module,' . $this->menu?->id,
            ],
            'slug' => 'required|max:200|unique:menus,slug,' . $this->menu?->id,
            'url' => 'nullable|max:200|unique:menus,url,' . $this->menu?->id,
            'icon' => 'nullable|max:200',
            'parent_id' => 'nullable|exists:menus,id',
            'order' => 'required|integer',
            'type' => "required|in:menu,group,divider",
            'target' => "required|in:_self,_blank",
            'location' => 'required|in:sidebar,topbar',
        ];
    }

}
