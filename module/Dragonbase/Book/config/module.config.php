<?php

return array(
    'controllers' => [
        'invokables' => [
            'Dragonbase\Book\Controller\Index' => 'Dragonbase\Book\Controller\IndexController',
        ],
    ],
    'router' => [
        'routes' => [
            'books' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/books',
                    'defaults' => [
                        'controller' => 'Dragonbase\Book\Controller\Index',
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'view' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/view/:id',
                            'defaults' => [
                                'controller' => 'Dragonbase\Book\Controller\Index',
                                'action' => 'view',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'controller_map' => [
            'Dragonbase' => true,
        ],
        'template_map' => [
            'dragonbase/book/index/index' => __DIR__ . '/../view/index/index.phtml',
        ],
    ],
);
