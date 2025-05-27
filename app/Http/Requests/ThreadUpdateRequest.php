<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThreadUpdateRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => [
                'sometimes',
                'string',
                'max:300',
                'unique:threads,title',
            ],
            'content' => [
                'sometimes',
                'string',
                'max:5000',
            ]
        ];
    }
}
