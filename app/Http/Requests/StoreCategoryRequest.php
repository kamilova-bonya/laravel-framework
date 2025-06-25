<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
        return [
            'name' => 'required|min:5|max:50|unique:categories',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" обязательно для заполнения',
            'name.min' => 'Название должно содержать минимум :min символов',
            'name.max' => 'Название должно содержать максимум :max символов',
            'name.unique' => 'Категория с таким названием уже существует',
        ];
    }

//    public function attributes(): array
//    {
//        return [
//            'name' => 'название',
//        ];
//    }
}
