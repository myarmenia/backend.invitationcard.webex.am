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
                'translations' => [
                    'am' => 'Հարսանիք',
                    'ru' => 'Свадьба',
                    'en' => 'Wedding'
                ]
            ],
            [
                'id' => 2,
                'key' => 'birthday',
                'translations' => [
                    'am' => 'Ծննդյան տարեդարձ',
                    'ru' => 'День рождения',
                    'en' => 'Birthday'
                ]
            ],
            [
                'id' => 3,
                'key' => 'event',
                'translations' => [
                    'am' => 'Ավարտական երեկույթ',
                    'ru' => 'Мероприятие',
                    'en' => 'Event'
                ]
            ]
        ];

        foreach ($categories as $key => $category) {
            $categor_y = Category::updateOrCreate([
                'id' => $category['id'],
                'key' => $category['key']
            ]);

            foreach (languages() as $k => $lang) {

                CategoryTranslation::updateOrCreate(
                    ['category_id' => $categor_y->id, 'lang' => $lang],
                    [
                        'name' => $category['translations'][$lang]
                    ]);
            }

        }
    }
}
