<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class IndexController extends Controller
{
    public function index() {
        $thread = Thread::all();
        return view('page.index', compact('thread'));
    }
}
