<?php

namespace AbysKit\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategory extends FormRequest
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
            'slug' => 'required|max:255|unique:categories,id,' . $this->id,
            'thumbnail' => 'nullable|mimes:jpeg,jpg,png|max:2048'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'slug' => trans('abyskit::validation.attributes.slug'),
            'thumbnail' => trans('abyskit::validation.attributes.thumbnail')
        ];
    }
}
