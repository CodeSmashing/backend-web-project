<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThreadUpdateRequest;
use App\Http\Requests\ThreadStoreRequest;
use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ThreadController extends Controller {
    /**
     * Display the thread.
     */
    public static function show(Request $request, Thread $thread) {
        return view('thread', [
            'thread' => $thread
        ]);
    }

    /**
     * Create a new thread.
     */
    public function store(ThreadStoreRequest $request) {
        $user = $request->user();

        $thread = Thread::create(array_merge(
            $request->validated(),
            ['user_id' => $user->id]
        ));

        return view('discussion-board');
    }

    /**
     * Update the thread information.
     */
    public function update(ThreadUpdateRequest $request, Thread $thread) {
        $thread->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Post updated successfully',
            'thread' => $thread->refresh()
        ]);
    }

    /**
     * Report the thread for administrators to review.
     */
    public function report(Request $request, Thread $thread) {
        // TODO: implement reporting logic/handling

        return response()->json([
            'status' => 'success',
            'message' => 'Thread reported successfully'
        ]);
    }

    /**
     * Destroy the thread model.
     */
    public function destroy(Request $request, Thread $thread) {
        $user = $request->user();

        if (Auth::user() === $user) {
            $thread->fill(['title' => 'Destroyed by user', 'content' => null, 'destroyed' => true, 'is_locked' => true]);
            $thread->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thread destroyed successfully',
            'thread' => $thread->refresh()
        ]);
    }

    /**
     * Delete the thread model.
     */
    public function delete(Request $request, Thread $thread) {
        $user = $request->user();

        if (Auth::user() === $user) {
            $thread->delete();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thread deleted successfully',
        ]);
    }
}
