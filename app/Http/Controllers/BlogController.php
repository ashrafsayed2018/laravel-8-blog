<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        return view("pages.blog.index");
    }

    public function show(Post $psot)
    {
        return view("pages.blog.show", compact("post"));
    }
}
