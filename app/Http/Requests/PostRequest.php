<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'color' => ['required', 'string'],
            'variety' => ['required', 'string'],
            'category_id' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название',
            'price' => 'Цена',
            'color' => 'Цвет',
            'variety' => 'Сорт',
            'category_id' => 'Категория',
        ];
    }

    public function messages(): array
    {
        return [
            'title' => 'Название обязательно для заполнения',
            'price' => 'Цена обязательно для заполнения',
            'color' => 'Цвет обязательно для заполнения',
            'variety' => 'Сорт обязательно для заполнения',
            'category_id' => 'Категория обязательно для заполнения',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status'   => false,
            'message'   => 'Ошибка заполнения данных',
            'errors' => $validator->errors()
        ], 422));
    }
}
