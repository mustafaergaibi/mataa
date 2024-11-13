<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Fetch posts with pagination
        $posts = Post::with('user')->paginate(10);

        return view('dashboard', compact('posts'));
    }
}
