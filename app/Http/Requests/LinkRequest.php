<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'link' => 'required|min:3',
            'material_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Заполните имя',
            'name.min' => 'Минимальная длина названия 3 символа',
            'name.max' => 'Максимальная длина названия 100 символов',
            'link.required' => 'Заполните ссылку',
            'link.min' => 'Минимальная длина ссылки 3 символа'
        ];
    }
}
