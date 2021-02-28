<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductStoreRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required',
            'route_name' => $this->getRouteNameRule(),
            'main_image' => 'nullable|file|image',
            'html_download_tag_android' => 'nullable',
            'html_download_tag_ios' => 'nullable',
            'html_privacy_policy' => 'required',
            'publish' => 'required|boolean',
        ];
    }

    public function getRouteNameRule(){

        $baseRule = ['required','string','regex:/^[\w_]+$/',];

        if(!$this->isMethod('post')){

            $baseRule[3] = Rule::unique('products','route_name')->ignore($this->route()->parameter('product'));
        }

        return $baseRule;
    }
}
