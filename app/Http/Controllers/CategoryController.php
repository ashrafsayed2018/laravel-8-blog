<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.categories.index", [
            'categories' => Category::with("subCategories")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view("dashboard.categories.create", [
            'categories' => Category::with("subCategories")->whereNull("parent_id")->get()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category            = new Category();
        $category->parent_id = $request->parent_id;
        $category->name      = $request->name;
        $category->slug      = make_slug($request->name);
        $category->save();
        return redirect()->route('categories.index')->with("success", "تم اضافة القسم بنجاح");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("dashboard.categories.edit", [
            'category' => $category,
            'categories' => Category::with("subCategories")->whereNull("parent_id")->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $this->validate($request, [
            'name' => ['required', "min:5", "max:50",   Rule::unique('categories')->ignore($category->id),],
            'parent_id' => ['sometimes', 'nullable', 'numeric']
        ]);
        $category->name = $request->name;
        $category->slug = make_slug($request->name);
        $category->parent_id = $request->parent_id;

        $category->save();

        return redirect()->route('categories.index')->with("success", "تم تحديث القسم بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with("success", "تم حذف القسم بنجاح");
    }

    public function subCategories()
    {
    }
}
