<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Thread;
use App\Category;

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
}
