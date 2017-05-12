<?php

namespace AbysKit\Database\Seeds;

use Illuminate\Database\Seeder;

use AbysKit\CategoryInfo;

class CategoryInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableSeeders = [
            [
                'title' => 'Tours',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 1,
                'locale_id' => 1
            ],
            [
                'title' => 'Туры',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 1,
                'locale_id' => 2
            ],
            [
                'title' => 'Hotels',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 2,
                'locale_id' => 1
            ],
            [
                'title' => 'Гостиницы',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 2,
                'locale_id' => 2
            ],
            [
                'title' => 'Car rent',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 3,
                'locale_id' => 1
            ],
            [
                'title' => 'Аренда автомобилей',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 3,
                'locale_id' => 2
            ],
            [
                'title' => 'Yacht rent',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 4,
                'locale_id' => 1
            ],
            [
                'title' => 'Аренда яхт',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 4,
                'locale_id' => 2
            ],
            [
                'title' => 'Photoshoot',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 5,
                'locale_id' => 1
            ],
            [
                'title' => 'Фотосессии',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 5,
                'locale_id' => 2
            ],
            [
                'title' => 'Transfer',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 6,
                'locale_id' => 1
            ],
            [
                'title' => 'Перевозки',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 6,
                'locale_id' => 2
            ],
            [
                'title' => 'Show',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 7,
                'locale_id' => 1
            ],
            [
                'title' => 'Шоу',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 7,
                'locale_id' => 2
            ],
            [
                'title' => 'Single room',
                'excerpt' => 'Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.',
                'category_id' => 8,
                'locale_id' => 1
            ],
            [
                'title' => 'Однакомнатная',
                'excerpt' => 'Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему.',
                'category_id' => 8,
                'locale_id' => 2
            ]
        ];

        foreach ($tableSeeders as $tableSeeder) {
            $seeder = new CategoryInfo();

            foreach ($tableSeeder as $field => $value) $seeder[$field] = $value;
            $seeder->save();
        }
    }
}
