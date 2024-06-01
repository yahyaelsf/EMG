<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreSuccessRequest extends BaseFormRequest
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
        foreach (config('app.supported_languages') as $language) {
            $rules['localizable.' . $language . '.s_title'] = 'required|string';
            $rules['localizable.' . $language . '.s_description'] = 'required|string';
        }

        return $rules;
    }
}
