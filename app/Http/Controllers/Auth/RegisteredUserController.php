<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Enums\UserRoleEnum;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller {
    /**
     * Display the registration view.
     */
    public function create(): View {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'display_name' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'avatar' => ['nullable', 'image', 'max:2048'],
            'role' => ['nullable', 'string'],
            'birthday' => ['nullable', 'string', 'max:255'],
            'about_me' => ['nullable', 'string', 'max:1080'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = $request->only(['name', 'email']);
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            // Store the image in storage/app/public/avatars
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        if ($request->filled('role')) {
            $enum = UserRoleEnum::tryFrom($request->role);

            if ($enum) {
                $data['role'] = $enum;
            }
        }

        foreach (['display_name', 'birthday', 'about_me'] as $field) {
            if ($request->filled($field)) {
                $data[$field] = $request->$field;
            }
        }

        $user = User::create($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
