<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCatalogRequest;
use App\Models\Category;

class CategoryController extends Controller {


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index() {
        $items = Category::all();
        return view('admin.category.index', compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function create() {
        // все категории для возможности выбора родителя
        $items = Category::all();
        return view('admin.category.create', compact('items'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCatalogRequest $request) {
        $data = $request->all();
        $category = Category::create($data);
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Новая категория успешно создана');
    }

    /**
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show(Category $category) {
        return view('admin.category.show', compact('category'));
    }

    /**
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function edit(Category $category) {
        // все категории для возможности выбора родителя
        $items = Category::all();
        return view('admin.category.edit',compact('category', 'items'));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryCatalogRequest $request, Category $category) {
        $data = $request->all();
        $category->update($data);
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Категория была успешно исправлена');
    }

    /**
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category) {
        if ($category->children->count()) {
            $errors[] = 'Нельзя удалить категорию с дочерними категориями';
        }
        if ($category->products->count()) {
            $errors[] = 'Нельзя удалить категорию, которая содержит товары';
        }
        if (!empty($errors)) {
            return back()->withErrors($errors);
        }
        $category->delete();
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Категория каталога успешно удалена');
    }
}
