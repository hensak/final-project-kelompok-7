<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Thread;
use App\Category;
use App\Comment;
use App\Like;

class ThreadController extends Controller
{
    public function create(Request $request) {
        $thread_title = $request->thread_title;
        $category = Category::all();
        return view('thread.create', compact('thread_title', 'category'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        // $category = Category::where('nama', $request->category)->first();
        // if($category == null) {
        //     Category::create([
        //         'nama' => $request->category,
        //     ]);
        // }
        $category = Category::where('nama', $request->category)->first();

        $date = date("Y-m-d h:i:s");
        Thread::create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => $date,
            'category_id' => $category->id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/');
    }

    public function like($thread_id) {
        $like = Like::where('thread_id', $thread_id)
                ->where('user_id', Auth::user()->id)
                ->first();
        if($like == null) {
            Like::create([
                'user_id' => Auth::user()->id,
                'thread_id' => $thread_id,
            ]);
        }

        return redirect('/');
    }

    public function like2($thread_id) {
        $like = Like::where('thread_id', $thread_id)
                ->where('user_id', Auth::user()->id)
                ->first();
        if($like == null) {
            Like::create([
                'user_id' => Auth::user()->id,
                'thread_id' => $thread_id,
            ]);
        }

        $string = "/thread/{$thread_id}";
        return redirect($string);
    }

    public function page($thread_id) {
        $thread = Thread::where('id', $thread_id)->first();
        $comment = Comment::where('thread_id', $thread_id)->get();
        $like = Like::where('thread_id', $thread_id)->get();
        return view('thread.page', compact('thread', 'comment', 'like'));
    }

    public function comment(Request $request, $thread_id) {
        $request->validate([
            'thread_comment' => 'required',
        ]);

        Comment::create([
            'comments' => $request->thread_comment,
            'thread_id' => $thread_id,
            'user_id' => Auth::user()->id,
        ]);

        $string = "/thread/{$thread_id}";
        return redirect($string);
    }

    public function comment_edit($thread_id, $comment_id) {
        $thread = Thread::where('id', $thread_id)->first();
        $comment = Comment::where('thread_id', $thread_id)->get();
        $like = Like::where('thread_id', $thread_id)->get();
        return view('thread.comment_update', compact('thread', 'comment', 'like', 'comment_id'));
    }

    public function comment_update(Request $request, $thread_id, $comment_id) {
        $request->validate([
            'thread_comment' => 'required',
        ]);

        $comment = Comment::where('id', $comment_id)->first();
        $comment->comments = $request->thread_comment;
        $comment->thread_id = $thread_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        $string = "/thread/{$thread_id}";
        return redirect($string);
    }

    public function comment_delete($thread_id, $comment_id) {
        $comment = Comment::find($comment_id);
        $comment->delete();

        $string = "/thread/{$thread_id}";
        return redirect($string);
    }

    public function myThread($user_id) {
        $mythread = Thread::where('user_id', $user_id)->get();
        // dd($mythread);
        return view('thread.my_thread', compact('mythread'));
    }

    public function myThread_edit($thread_id) {
        $mythread = Thread::find($thread_id);
        $category = Category::all();
        // dd($mythread);
        return view('thread.my_thread_edit', compact('mythread', 'category'));
    }

    public function myThread_update(Request $request, $thread_id) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $mythread = Thread::where('id', $thread_id)->first();
        $category = Category::where('nama', $request->category)->first();
        // dd($mythread->user->id);

        $mythread->title = $request->title;
        $mythread->content = $request->content;
        // $mythread->date = $request->date;
        $mythread->category_id = $category->id;
        $mythread->save();

        $string = "/myThread/{$mythread->user->id}";
        return redirect($string);
    }
}
