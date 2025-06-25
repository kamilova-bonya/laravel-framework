<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|min:5|max:255',
            'content' => 'required|min:5|max:20000',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле "Заголовок" обязательно для заполнения',
            'title.min' => 'Заголовок должен содержать минимум :min символов',
            'title.max' => 'Заголовок не должен превышать :max символов',

            'content.required' => 'Поле "Текст" обязательно для заполнения',
            'content.min' => 'Текст должен содержать минимум :min символов',
            'content.max' => 'Текст не должен превышать :max символов',

            'category_id.required' => 'Необходимо выбрать категорию',
            'category_id.exists' => 'Выбранная категория не существует',
        ];
    }

//    public function attributes(): array
//    {
//        return [
//            'content' => 'текст'
//        ];
//    }
}
