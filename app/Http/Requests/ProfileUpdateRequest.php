<?php

namespace App\Http\Requests;

use App\Models\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class ProfileUpdateRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'display_name' => ['sometimes', 'string', 'max:255'],
            'name' => ['sometimes', 'string', 'max:255'],
            'avatar' => ['sometimes', 'image', 'max:2048'],
            'role' => [
                'sometimes',
                'string',
                Rule::enum(UserRoleEnum::class)
            ],
            'birthday' => ['sometimes', 'string', 'max:255'],
            'about_me' => ['sometimes', 'string', 'max:1080'],
            'email' => [
                'sometimes',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'password' => ['sometimes', 'confirmed', Rules\Password::defaults()]
        ];
    }
}
