<?php

namespace App\Http\Controllers\shop\Admin;

use App\Category;
use App\Http\Controllers\Shop\Admin\AdminBaseController;
use App\Partner;
use App\Product;
use App\Storage;
use Illuminate\Http\Request;

class ProductController extends AdminBaseController
{

    public function index(Product $productWith){
        $rootProducts = $productWith->rootProducts();
        return view('shop.admin.product.index', [
            'rootProducts' => $rootProducts,
            ]);
    }

    public function create(Category $productCategory, Storage $productStorage, Partner $productPartner)
    {
        $rootCategories = $productCategory->with('product')->get();
        $rootStorage = $productStorage->with('product')->get();
        $rootPartner = $productPartner->with('product')->get();
        return view('shop.admin.product.create', [
            'rootCategories' => $rootCategories,
            'rootStorage' => $rootStorage,
            'rootPartner' => $rootPartner,
            'product' => [],
            'products' => Product::class,
        ]);
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('shop.admin.product.index.store');
    }

    public function edit(Product $product, Category $productCategory, Storage $productStorage, Partner $productPartner)
    {
        $product->with('categories', 'storage', 'partner')->get();
        $rootCategories = $productCategory->with('product')->get();
        $rootStorage = $productStorage->with('product')->get();
        $rootPartner = $productPartner->with('product')->get();
        return view('shop.admin.product.edit', [
            'rootCategories' => $rootCategories,
            'rootStorage' => $rootStorage,
            'rootPartner' => $rootPartner,
            'product' => $product,
            'products' => Product::class,
        ]);

    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('shop.admin.product.index.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('shop.admin.product.index.store');
    }
}
