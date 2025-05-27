<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
    public static function getThreadPostList(string $threadId) {
        return Post::select(['*'])
            ->where('thread_id', '=', $threadId)
            ->whereNull('post_id')
            ->get();
    }

    /**
     * Create a new post.
     */
    public function store(PostStoreRequest $request) {
        $post = Post::create(array_merge(
            $request->validated()
        ));

        $view = view('components/post', [
            'post' => $post
        ])->render();

        return response()->json([
            'view' => $view,
            'status' => 'success',
            'message' => 'Post created successfully',
            'post' => $post
        ]);
    }

    /**
     * Update the post information.
     */
    public function update(PostUpdateRequest $request, Post $post) {
        $post->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Post updated successfully',
            'post' => $post->refresh()
        ]);
    }

    /**
     * Report the post for administrators to review.
     */
    public function report(Request $request, Post $post) {
        // TODO: implement reporting logic/handling

        return response()->json([
            'status' => 'success',
            'message' => 'Post reported successfully'
        ]);
    }

    /**
     * Destroy the post model.
     */
    public function destroy(Request $request, Post $post) {
        $user = $request->user();

        if (Auth::user() === $user) {
            $post->fill(['content' => 'Destroyed by user', 'destroyed' => true]);
            $post->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Post destroyed successfully',
            'post' => $post->refresh()
        ]);
    }

    /**
     * Delete the post model.
     */
    public function delete(Request $request, Post $post) {
        $user = $request->user();

        if (Auth::user() === $user) {
            $post->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Post deleted successfully',
            ]);
        } else {

            return response()->json([
                'status' => 'failure',
                'message' => 'User isn\'t authorized for this',
            ]);
        }
    }
}
