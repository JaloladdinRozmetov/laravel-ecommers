<?php

namespace App\Http\Controllers;

use App\Models\Basket;

use Illuminate\Http\Request;

class BasketController extends Controller {


    private $basket;

    public function __construct() {
        $this->basket = Basket::getBasket();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        $products = $this->basket->products;
        $amount = $this->basket->getAmount();
        return view('basket.index', compact('products', 'amount'));
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $id) {
        $basket_id = $request->cookie('basket_id');
        $quantity = $request->input('quantity') ?? 1;
        if (empty($basket_id)) {
            $basket = Basket::create();
            $basket_id = $basket->id;
        } else {
            $basket = Basket::findOrFail($basket_id);
            $basket->touch();
        }
        if ($basket->products->contains($id)) {
            $pivotRow = $basket->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            $basket->products()->attach($id, ['quantity' => $quantity]);
        }
        return back()->withCookie(cookie('basket_id', $basket_id, 525600));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function plus($id) {
        $this->basket->increase($id);
        return redirect()->route('basket.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function minus($id) {
        $this->basket->decrease($id);
        return redirect()->route('basket.index');
    }

    /**
     * Удаляет товар с идентификаторм $id из корзины
     */
    public function remove($id) {
        $this->basket->remove($id);
        return redirect()->route('basket.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear() {
        $this->basket->delete();
        return redirect()->route('basket.index');
    }
}
