<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Enums\UserRoleEnum;

class User extends Authenticatable {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'display_name',
        'name',
        'email',
        'avatar',
        'role',
        'birthday',
        'about_me',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRoleEnum::class,
        ];
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => UserRoleEnum::class,
    ];

    public function isAdmin(): bool {
        return $this->role->value === UserRoleEnum::ADMIN->value;
    }

    /**
     * Get the role associated with the user.
     */
    public function role() {
        return $this->hasOne(UserRoleEnum::class);
    }

    /**
     * Get the threads for the user.
     */
    public function threads() {
        return $this->hasMany(Thread::class);
    }

    /**
     * Get the posts for the user.
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
