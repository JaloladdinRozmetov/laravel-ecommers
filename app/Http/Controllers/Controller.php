<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $parentCategories = Category::query()->where('parent_id', 0)->get();

        $products = Product::query()->latest()->get();
        return view('catalog.index', compact('parentCategories','products'));
    }

    /**
     * @param $category_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function products($category_id)
    {
        $categories = Category::query()->where('id',$category_id)->with('children','products')->firstOrFail();

        $products = Category::query()->whereIn('id',$categories->getAllChildren($category_id))->with('products')->latest()->get();
        return view('catalog.products',compact('categories','category_id','products'));
    }

    /**
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function product($id) {
        $product = Product::query()->where('id',$id)->with('category')->firstOrFail();

        return view('catalog.product', compact('product'));
    }

}
