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

    /**
     * Get the posts for the post.
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the user that owns the post.
     */
    public function user() {

        return $this->belongsTo(User::class);
    }

    /**
     * Get the thread that contains the post.
     */
    public function thread() {

        return $this->belongsTo(Thread::class);
    }

    /**
     * Get the post that contains the post.
     */
    public function post() {

        return $this->belongsTo(Post::class);
    }
}
