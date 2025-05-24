<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Post;
use App\Helpers\PostHelper;

class ThreadController extends Controller {
    public static function show(Thread $thread) {
        $postList = self::getPostList($thread->id);

        return view('thread', [
            'thread' => $thread,
            'postList' => $postList
        ]);
    }

    public static function getPostList(string $threadId) {
        return Post::select(['*'])
            ->where('thread_id', '=', $threadId)
            ->whereNull('post_id')
            ->get();
    }
}
