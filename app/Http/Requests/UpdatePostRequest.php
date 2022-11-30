<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
        return [
            'title' => [
                'required',
                'string',
            ],
            'description' => [
                'required'
            ],
            'content' => [
                'required'
            ],
            'photo' => [
                'nullable',
                'file',
                'image',
            ],
            'category_id' => [
                'required',
                Rule::exists(Category::class, 'id'),
            ],
        ];
    }
}
