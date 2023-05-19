<?php

namespace App\Http\Requests;

class ProductCatalogRequest extends CatalogRequest {

    /**
     * @var array
     */
    protected $entity = [
        'name' => 'product',
        'table' => 'products'
    ];

    /**
     * @return bool
     */
    public function authorize() {
        return parent::authorize();
    }

    /**
     * @return array
     */
    public function rules() {
        return parent::rules();
    }

    /**
     * @return array[]
     */
    protected function createItem() {
        $rules = [
            'category_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'price' => [
                'required',
                'numeric',
                'min:1'
            ],
        ];
        return array_merge(parent::createItem(), $rules);
    }

    /**
     * @return array[]
     */
    protected function updateItem() {
        $rules = [
            'category_id' => [
                'required',
                'integer',
                'min:1'
            ],
            'price' => [
                'required',
                'numeric',
                'min:1'
            ],
        ];
        return array_merge(parent::updateItem(), $rules);
    }
}
