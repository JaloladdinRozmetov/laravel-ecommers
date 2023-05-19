<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cookie;

class Basket extends Model {


    protected $table = 'baskets';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    /**
     * @param $id
     * @param $count
     * @return void
     */
    public function increase($id, $count = 1) {
        $this->change($id, $count);
    }

    /**
     * @param $id
     * @param $count
     * @return void
     */
    public function decrease($id, $count = 1) {
        $this->change($id, -1 * $count);
    }

    /**
     * @param $id
     * @param $count
     * @return void
     */
    private function change($id, $count = 1) {
        if ($count == 0) {
            return;
        }
        $id = (int)$id;
        if ($this->products->contains($id)) {
            $pivotRow = $this->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $count;
            if ($quantity > 0) {
                $pivotRow->update(['quantity' => $quantity]);
            } else {
                $pivotRow->delete();
            }
        } elseif ($count > 0) { // иначе — добавляем в корзину
            $this->products()->attach($id, ['quantity' => $count]);
        }
        $this->touch();
    }

    /**
     * @param $id
     * @return void
     */
    public function remove($id) {
        $this->products()->detach($id);
        $this->touch();
    }

    /**
     * @return void
     */
    public function clear() {
        $this->products()->detach();
        $this->touch();
    }

    /**
     * @return float|int|mixed
     */
    public function getAmount() {
        $amount = 0.0;
        foreach ($this->products as $product) {
            $amount = $amount + $product->price * $product->pivot->quantity;
        }
        return $amount;
    }

    /**
     * @return int
     */
    public static function getCount() {
        $basket_id = request()->cookie('basket_id');
        if (empty($basket_id)) {
            return 0;
        }
        return self::getBasket()->products->count();
    }

    /**
     * @return mixed
     */
    public static function getBasket() {
        $basket_id = (int)request()->cookie('basket_id');
        if (!empty($basket_id)) {
            try {
                $basket = Basket::findOrFail($basket_id);
            } catch (ModelNotFoundException $e) {
                $basket = Basket::create();
            }
        } else {
            $basket = Basket::create();
        }
        Cookie::queue('basket_id', $basket->id, 525600);
        return $basket;
    }
}
