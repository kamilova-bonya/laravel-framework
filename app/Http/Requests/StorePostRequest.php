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
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
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


            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Изображение должно быть одного из форматов: jpeg, png, jpg, gif, svg',
            'image.max' => 'Размер изображения не должен превышать :max КБ',
        ];
    }

//    public function attributes(): array
//    {
//        return [
//            'content' => 'текст'
//        ];
//    }
}
