<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'key' => 'wedding',
            ],
            [
                'id' => 2,
                'key' => 'birthday',
            ],
            [
                'id' => 3,
                'key' => 'event',
            ]
        ];

        foreach ($categories as $key => $category) {
            $category = Category::updateOrCreate([
                'id' => $category['id'],
                'key' => $category['key']
            ]);

            foreach (languages() as $k => $lang) {
                CategoryTranslation::updateOrCreate(
                    ['category_id' => $category->id, 'lang' => $lang],
                    [
                        'name' => "aaa - $key - $lang"
                    ]);
            }

        }
    }
}
