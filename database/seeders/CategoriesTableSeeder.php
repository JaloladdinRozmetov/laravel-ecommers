<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'name'          =>  'Автомобильные запчасти',
                'parent_id'     =>  0,
            ]);
        Category::create(
            [
                'name'          =>  'Автомобильные шины',
                'parent_id'     =>  1,
            ]);
        Category::create(
            [
                'name'          =>  'Автомобильные аккумуляторы ',
                'parent_id'     =>  1,
            ]);
        Category::create(
            [
                'name'          =>  ' Фары ',
                'parent_id'     =>  1,
            ],);
        Category::create(
            [
                'name'          =>  'Автотовары',
                'parent_id'     =>  0,
            ],);
        Category::create(
            [
                'name'          =>  'Руль для авто',
                'parent_id'     =>  5,
            ],);
        Category::create(
            [
                'name'          =>  'Автомобильные коврики',
                'parent_id'     =>  5,
            ],);
        Category::create(
            [
                'name'          =>  'Автоаксессуары',
                'parent_id'     =>  5,
            ],);
    }
}
