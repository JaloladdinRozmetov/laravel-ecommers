<?php

namespace App\Http\Requests;

use App\Rules\CategoryParent;

class CategoryCatalogRequest extends CatalogRequest {

    /**
     * @var array
     */
    protected $entity = [
        'name' => 'category',
        'table' => 'categories'
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
            'parent_id' => [
                'required',
                'regex:~^[0-9]+$~',
            ],
        ];
        return array_merge(parent::createCategory(), $rules);
    }

    /**
     * @return array[]
     */
    protected function updateItem() {
        // получаем объект модели категории из маршрута: admin/category/{category}
        $model = $this->route('category');
        $rules = [
            'parent_id' => [
                'required',
                'regex:~^[0-9]+$~',
                // задаем правило, чтобы категорию нельзя было поместить внутрь себя
                new CategoryParent($model)
            ],
        ];
        return array_merge(parent::updateCategory(), $rules);
    }
}
