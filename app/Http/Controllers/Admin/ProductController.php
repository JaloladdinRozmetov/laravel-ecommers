<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCatalogRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller {


    /**
     * Показывает список всех товаров
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $products = Product::query()->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Показывает товары категории
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function category(Category $category) {
        $products = $category->products()->get();
        return view('admin.product.category', compact('category', 'products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create() {
        // все категории для возможности выбора родителя
        $items = Category::query()->with("categories")->get();

        return view('admin.product.create', compact('items'));
    }

    /**
     * Сохраняет новый товар в базу данных
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductCatalogRequest $request) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $image = $request->file('image')->move('images/products/', $filename);
        }

        $product = Product::create([
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $image->getPathname(),
            'category_id' => $data['category_id']
        ]);
        return redirect()
            ->route('admin.product.show', ['product' => $product->id])
            ->with('success', 'Новый товар успешно создан');
    }

    /**
     * Показывает страницу товара
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product) {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Показывает форму для редактирования товара
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product) {
        // все категории для возможности выбора родителя
        $items = Category::query()->with('categories')->get();

        return view('admin.product.edit', compact('product', 'items'));
    }

    /**
     * Обновляет товар каталога в базе данных
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductCatalogRequest $request, Product $product) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $randomize = rand(111111, 999999);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $randomize . '.' . $extension;
            $image = $request->file('image')->move('images/products/', $filename);
            $imagePathName = $image->getPathname();
        }
        else{
            $imagePathName = null;
        }
        $product->update([
            'product_name' => $data['product_name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $imagePathName,
            'category_id' => $data['category_id']
        ]);
        return redirect()
            ->route('admin.product.show', ['product' => $product->id])
            ->with('success', 'Товар был успешно обновлен');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product) {
        $product->delete();
        return redirect()
            ->route('admin.index')
            ->with('success', 'Товар каталога успешно удален');
    }
}
