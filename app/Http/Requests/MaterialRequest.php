<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'type_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|min:3|max:200',
            'author' => 'required|min:3|max:300',
            'description' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'type_id.required' => 'Выберите тип материала',
            'category_id.required' => 'Выберите категорию материала',
            'name.required' => 'Введите название материала',
            'name.min' => 'Минимальная длина названия 3 символа',
            'name.max' => 'Максимальная длина названия 200 символов',
            'author.required' => 'Введите имена авторов материала',
            'author.min' => 'Минимальная длина имен 3 символа',
            'author.max' => 'Максимальная длина имен 200 символов',
            'description.required' => 'Введите описание материала',
            'description.min' => 'Минимальная длина описания 10 символов',
        ];
    }
}
