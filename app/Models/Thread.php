<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'destroyed',
        'is_locked'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'destroyed' => 'boolean',
            'is_locked' => 'boolean',
        ];
    }

    protected $casts = [
        'destroyed' => 'boolean',
        'is_locked' => 'boolean',
    ];

    /**
     * Get the posts for the thread.
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the user that owns the thread.
     */
    public function user() {

        return $this->belongsTo(User::class);
    }
}
