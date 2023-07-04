<?php

namespace App\Http\Requests;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCommentRequest extends FormRequest
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
            'id_post' => [
                'required',
                Rule::exists(Post::class, 'id'),
            ],
            'id_user' => [
                'required',
                Rule::exists(User::class, 'id'),
            ],
            'content' => [
                'required',
                'string',
            ]
        ];
    }
}
