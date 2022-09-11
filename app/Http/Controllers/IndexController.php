<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Category;
use App\Like;

class IndexController extends Controller
{
    public function index() {
        $thread = Thread::orderBy('id', 'DESC')->get();
        $category = Category::all();
        $like = Like::all();
        return view('page.index', compact('thread', 'category', 'like'));
    }
}
