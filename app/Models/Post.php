<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'content',
        'thread_id',
        'post_id',
        'destroyed'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'destroyed' => 'boolean',
        ];
    }

    protected $casts = [
        'destroyed' => 'boolean',
    ];
}
