<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'description' => ['required'],
                'dimensions' => ['required'],
                'category_id' => ['required'],
                'code' => ['required'],
                'reference' => ['required'],
                'stock' => ['required'],
                'price' => ['required'],
                'active' => ['required']

            ];
        } else {
            return [
                'description' => ['sometimes','required'],
                'dimensions' => ['sometimes','required'],
                'category_id' => ['sometimes','required'],
                'code' => ['sometimes','required'],
                'reference' => ['sometimes','required'],
                'stock' => ['sometimes','required'],
                'price' => ['sometimes','required'],
                'active' =>['sometimes','required'],

            ];
        }
    }
}
