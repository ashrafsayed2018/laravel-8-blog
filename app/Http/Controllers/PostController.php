<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.posts.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.posts.create", [
            'tags' => Tag::all(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post                   = new Post();
        $post->user_id          = auth()->id();
        $post->title            = $request->title;
        $post->slug             = make_slug($request->title);
        $post->body             = $request->body;
        $post->category_id      = $request->category_id;
        $post->published_at     = $request->published_at;
        $post->meta_description = $request->meta_description;

        // chech if the request has a file
        if ($request->hasFile("cover_image")) {

            $image              = $request->file("cover_image");
            $imageName          = $image->getClientOriginalName();
            $imageNewName = pathinfo($imageName, PATHINFO_FILENAME);
            $fileExtension      = time() . "." . $imageNewName . "." . $image->getClientOriginalExtension();

            // image location
            $location           = storage_path("app/public/images/" . $fileExtension);
            // resize the image and save it in file path
            Image::make($image)->resize(1200, 630)->save($location);

            // save the image in db
            $post->cover_image      = $fileExtension;
        }
        // save the post
        $post->save();
        $post->tags()->sync($request->tags);

        if ($post->save()) {
            return redirect()->route("posts.index")->with("success", "تم اضافة المقال بنجاح");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view("dashboard.posts.edit", [
            'post' => $post,
            "categories" => Category::all(),
            'tags' => Tag::all(),
            'postTags' => $post->tags->pluck("id")->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post                   = new Post();
        $post->user_id          = auth()->id();
        $post->title            = $request->title;
        $post->slug             = make_slug($request->title);
        $post->body             = $request->body;
        $post->category_id      = $request->category_id;
        $post->published_at     = $request->published_at;
        $post->meta_description = $request->meta_description;

        // chech if the request has a file
        if ($request->hasFile("cover_image")) {

            // first delete the old image

            File::delete("app/public/images/" . $post->cover_image);
            $image              = $request->file("cover_image");
            $imageName          = $image->getClientOriginalName();
            $imageNewName = pathinfo($imageName, PATHINFO_FILENAME);
            $fileExtension      = time() . "." . $imageNewName . "." . $image->getClientOriginalExtension();

            // image location
            $location           = storage_path("app/public/images/" . $fileExtension);
            // resize the image and save it in file path
            Image::make($image)->resize(1200, 630)->save($location);

            // save the image in db
            $post->cover_image      = $fileExtension;
        }
        // save the post
        $post->save();
        $post->tags()->sync($request->tags);

        if ($post->save()) {
            return redirect()->route("posts.index")->with("success", "تم تحديث المقال بنجاح");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
