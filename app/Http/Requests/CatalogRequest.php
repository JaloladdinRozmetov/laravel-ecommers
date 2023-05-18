<?php

namespace App\Http\Requests;

use App\Rules\CategoryParent;
use Illuminate\Foundation\Http\FormRequest;

abstract class CatalogRequest extends FormRequest {

    /**
     * С какой сущностью сейчас работаем: категория, бренд, товар
     * @var array
     */
    protected $entity = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        switch ($this->method()) {
            case 'POST':
                return $this->createItem();
            case 'PUT':
            case 'PATCH':
                $rules = $this->updateItem();
                return $rules;
        }
    }

    /**
     * Задает дефолтные правила для проверки данных при добавлении
     * категории, бренда или товара
     */
    protected function createItem() {
        return [
            'product_name' => [
                'required',
                'max:100',
            ],
        ];
    }

    protected function createCategory() {
        return [
            'name' => [
                'required',
                'max:100',
            ],
        ];
    }

    /**
     * Задает дефолтные правила для проверки данных при обновлении
     * категории, бренда или товара
     */
    protected function updateItem() {
        $model = $this->route($this->entity['name']);
        return [
            'product_name' => [
                'required',
                'max:1000',
            ],
        ];
    }

    /**
     * Задает дефолтные правила для проверки данных при обновлении
     * категории, бренда или товара
     */
    protected function updateCategory() {
        $model = $this->route($this->entity['name']);
        return [
            'name' => [
                'required',
                'max:1000',
            ],
        ];
    }
}
