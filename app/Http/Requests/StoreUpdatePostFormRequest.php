<?php

namespace App\Http\Requests;

use App\Rules\Tenant\TenantUnique;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:3',
                'max:100',
                new TenantUnique('posts', $this->segment(3)),
            ],
            'body' => 'required|max:10000',
        ];
    }
}
