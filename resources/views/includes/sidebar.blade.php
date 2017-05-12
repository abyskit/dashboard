<?php

$panelNavigations = [
    [
        'panel_title' => trans('abyskit::default.categories'),
        'panel_navigation' => [
            [
                'title' => trans('abyskit::default.all_categories'),
                'icon' => 'fa-file-text-o',
                'url' => route('abyskit.category.list.page')
            ],
            [
                'title' => trans('abyskit::actions.add_name', ["name" => trans("abyskit::default.category")]),
                'icon' => 'fa-file-o',
                'url' => route('abyskit.category.create.page')
            ]
        ]
    ],
    [
        'panel_title' => trans('abyskit::default.pages'),
        'panel_navigation' => [
            [
                'title' => trans('abyskit::default.all_pages'),
                'icon' => 'fa-file-text-o',
                'url' => 'dashboard/page/list.html'
            ],
            [
                'title' => trans('abyskit::actions.add_name', ["name" => trans("abyskit::default.page")]),
                'icon' => 'fa-file-o',
                'url' => 'dashboard/page/single/add.html'
            ]
        ]
    ],
    [
        'panel_title' => trans('abyskit::default.posts'),
        'panel_navigation' => [
            [
                'title' => trans('abyskit::default.all_posts'),
                'icon' => 'fa-file-text-o',
                'url' => 'dashboard/post/list.html'
            ]
        ]
    ],
    [
        'panel_title' => trans('abyskit::default.commons'),
        'panel_navigation' => [
           /* [
                'title' => trans('abyskit::default.users.users'),
                'icon' => 'fa-users',
                'url' => 'dashboard/user/list.html'
            ],*/
            [
                'title' => trans('abyskit::default.suppliers'),
                'icon' => 'fa-users',
                'url' => 'dashboard/supplier/list.html?status=0',
                'count' => 1
            ],
            [
                'title' => trans('abyskit::default.countries'),
                'icon' => 'fa-flag',
                'url' => 'dashboard/location/list.html'
            ],
            [
                    'title' => trans('abyskit::default.localization'),
                    'icon' => 'fa-language',
                    'url' => 'dashboard/localization.html'
            ],
            [
                'title' => trans('currency.currencies'),
                'icon' => 'fa-money',
                'url' => 'dashboard/currencies.html'
            ],
            [
                'title' => trans('abyskit::default.settings'),
                'icon' => 'fa-cogs',
                'url' => 'dashboard/settings.html'
            ]
        ]
    ]
];
?>

@foreach($panelNavigations as $panelNavigation)
    @include('abyskit::includes.components.panels.panel-navigation', $panelNavigation)
@endforeach