<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Category;

class IndexController extends Controller
{
    public function index() {
        $thread = Thread::all();
        // dd($thread);
        return view('page.index', compact('thread'));
    }
}
