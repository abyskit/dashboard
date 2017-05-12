<?php

namespace AbysKit\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryInfo extends FormRequest
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
            'info.*.title' => 'required|max:255',
            'info.*.price_measurement' => 'max:255',
            'info.*.excerpt' => 'max:255'
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
            'info.*.title' => trans('abyskit::validation.attributes.title'),
            'info.*.price_measurement' => trans('abyskit::validation.attributes.price_measurement'),
            'info.*.excerpt' => trans('abyskit::validation.attributes.excerpt')
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            if ($validator->failed()) {
                $validator->errors()->add('check_locale_fields', trans('abyskit::validation.messages.check_locale_fields'));
            }
        });
    }
}
