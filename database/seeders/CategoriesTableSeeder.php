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
        Category::create([
            'name'          =>  'Main',
            'parent_id'     =>  0,
        ],
            [
                'name'          =>  'Catalog',
                'parent_id'     =>  0,
            ],
            [
                'name'          =>  'category',
                'parent_id'     =>  0,
            ]);

       Category::factory()->count(10)->create();
    }
}
