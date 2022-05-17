<?php

namespace Categories\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'content' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Min Characters of Title are 2',
            'title.max' => 'Max Characters of Title are 255',

            'content.required' => 'Content is required',
            'content.min' => 'Min Characters of Content are 2',

        ];
    }
}
