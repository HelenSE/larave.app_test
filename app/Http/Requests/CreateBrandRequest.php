<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBrandRequest extends FormRequest
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

        $id = (is_object ($this->brand)? $this->brand->id:$this->brand) ?? null ;

        return [
            'name' => [
                'required',
                'min:3',
                'max:100',
                'unique:brands,name,'.$id,
                Rule::unique('brands', 'name')->ignore($id)
                ],
            'user_id'=> [
                Rule::in([1,2,3])
            ]
        ];
    }

    public function messages()
    {
        return [
          'name.min' => 'Новое сообщение об ошибке',
          'name.email' => 'Некорректный е-мейл',
            'name.unique' => 'Имя занято'
            //hgkhgkg
        ];

    }
}
