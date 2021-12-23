<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
           'name' => 'filled|alpha|max:20|min:5'
        ];
    }

    public function messages()
    {
        return [
            'name.filled' => 'Имя должно быть заполнено',
            'name.alpha' => 'Имя должо состоять из букв',
            'name.max' => 'Имя не может быть ,более 20 символов',
            'name.min' => 'Имя не может быть менее 5 символов'
        ];

    }


}
