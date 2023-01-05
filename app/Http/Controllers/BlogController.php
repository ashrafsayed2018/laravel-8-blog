<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {

        $today = new DateTime();
        return view("pages.blog.index", [
            'posts' => Post::where("featured", true)
                ->whereNotNull("published_at")
                ->where("published_at", "<=", $today)
                ->latest()
                ->take(3)
                ->get()
        ]);
    }
}
