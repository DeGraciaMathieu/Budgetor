<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CopyCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_copy' => 'required|string',
            'budget_id' => 'required|exists:budgets,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
