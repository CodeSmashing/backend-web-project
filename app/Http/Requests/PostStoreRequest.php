<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],
            'content' => [
                'required',
                'string',
                'max:5000',
            ],
            'thread_id' => [
                'required',
                'integer',
                'exists:threads,id',
            ],
            'post_id' => [
                'nullable',
                'integer',
                'exists:posts,id',
            ]
        ];
    }
}
