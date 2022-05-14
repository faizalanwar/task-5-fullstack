<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Articles;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $art = [
            [
                'title' => 'article 1',
                'content' => 'content 1',
                'image' => '1.jpg', 
                'user_id' => '1',
                'category_id' => '1',
            ],
            [
                'title' => 'article 2',
                'content' => 'content 2',
                'image' => '2.jpg', 
                'user_id' => '2',
                'category_id' => '2',
            ],
        ];

        Articles::insert($art);
    }
}
