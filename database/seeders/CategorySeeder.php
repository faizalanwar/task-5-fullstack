<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = [
            [
                'name' => 'category1',
                'user_id' => '1',
            ],
            [
                'name' => 'category2',
                'user_id' => '2',
            ],
        ];

        Categories::insert($cat);
    }
}
