<?php

return array(
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'PhlySimplePage\Controller\Page',
                        'template'   => 'dragonbase/static/about',
                    ],
                ],
            ],
            'about' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/about',
                    'defaults' => [
                        'controller' => 'PhlySimplePage\Controller\Page',
                        'template'   => 'dragonbase/static/about',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'bibliography' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/bibliography',
                            'defaults' => [
                                'controller' => 'PhlySimplePage\Controller\Page',
                                'template'   => 'dragonbase/static/bibliography',
                            ],
                        ],
                    ],
                ],
            ],
            'fairwind' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/fair-wind',
                    'defaults' => [
                        'controller' => 'PhlySimplePage\Controller\Page',
                        'template'   => 'dragonbase/static/fairwind',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'dragonbase/static/about'        => __DIR__ . '/../view/static/about.phtml',
            'dragonbase/static/bibliography' => __DIR__ . '/../view/static/bibliography.phtml',
            'dragonbase/static/books'        => __DIR__ . '/../view/static/books.phtml',
            'dragonbase/static/fairwind'     => __DIR__ . '/../view/static/fairwind.phtml',
        ],
    ],
);
