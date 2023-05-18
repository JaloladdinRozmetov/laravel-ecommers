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
     * Показывает корзину покупателя
     */
    public function index() {
        $products = $this->basket->products;
        $amount = $this->basket->getAmount();
        return view('basket.index', compact('products', 'amount'));
    }

    /**
     * Форма оформления заказа
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request) {
        $profile = null;
        $profiles = null;
        if (auth()->check()) { // если пользователь аутентифицирован
            $user = auth()->user();
            // ...и у него есть профили для оформления
            $profiles = $user->profiles;
            // ...и был запрошен профиль для оформления
            $prof_id = (int)$request->input('profile_id');
            if ($prof_id) {
                $profile = $user->profiles()->whereIdAndUserId($prof_id, $user->id)->first();
            }
        }
        return view('basket.checkout', compact('profiles', 'profile'));
    }



    /**
     * Добавляет товар с идентификатором $id в корзину
     */
    public function add(Request $request, $id) {
        $quantity = $request->input('quantity') ?? 1;
        $this->basket->increase($id, $quantity);
        dd(1);
        if ( ! $request->ajax()) {
            // выполняем редирект обратно на ту страницу,
            // где была нажата кнопка «В корзину»
            return back();
        }
        // в случае ajax-запроса возвращаем html-код корзины в правом
        // верхнем углу, чтобы заменить исходный html-код, потому что
        // теперь количество позиций будет другим
        $positions = $this->basket->products()->count();
        return view('basket.part.basket', compact('positions'));
    }

    /**
     * Увеличивает кол-во товара $id в корзине на единицу
     */
    public function plus($id) {
        $this->basket->increase($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Уменьшает кол-во товара $id в корзине на единицу
     */
    public function minus($id) {
        $this->basket->decrease($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Удаляет товар с идентификаторм $id из корзины
     */
    public function remove($id) {
        $this->basket->remove($id);
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }

    /**
     * Полностью очищает содержимое корзины покупателя
     */
    public function clear() {
        $this->basket->delete();
        // выполняем редирект обратно на страницу корзины
        return redirect()->route('basket.index');
    }
}
