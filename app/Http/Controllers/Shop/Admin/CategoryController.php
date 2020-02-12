<?php

namespace App\Http\Controllers\shop\Admin;

use App\Category;
use App\Http\Controllers\Shop\Admin\AdminBaseController;
use Illuminate\Http\Request;

class CategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param Category $productCategory
     * @return \Illuminate\Http\Response
     */

    public function index(Category $productCategory){
        $rootCategories = $productCategory->rootCategories();
        return view('shop.admin.categories.index', [
            'rootCategories' => $rootCategories,]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.categories.create', [
            'category' => [],
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('shop.admin.categories.index.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('shop.admin.categories.edit', [
            'category' => $category,
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter' => ''
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->except('slug'));
        return redirect()->route('shop.admin.categories.index.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->delete() and $category->where('parent_id', $category->id)->update(['parent_id' => 0]);;

        return redirect()->route('shop.admin.categories.index.store');
    }
}
