<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Form;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'form' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/form[/:action]',
                    'defaults' => [
                        'controller' => Controller\FormElementController::class,
                        'action' => 'index'
                    ],
                    'contraints' => [
                        'action' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
            'test1' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/test[/:action]',
                    'defaults' => [
                        'controller' => Controller\Test1Controller::class,
                        'action' => 'index'
                    ],
                    'contraints' => [
                        'action' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
            'test12' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/test22[/:action]',
                    'defaults' => [
                        'controller' => Controller\Test1Controller::class,
                        'action' => 'index'
                    ],
                    'contraints' => [
                        'action' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
            'input-filter' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/login[/:action]',
                    'defaults' => [
                        'controller' => Controller\InputFilterController::class,
                        'action' => 'index'
                    ],
                    'contraints' => [
                        'action' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
            'upload-file' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/upload-file[/:action]',
                    'defaults' => [
                        'controller' => Controller\UploadFileController::class,
                        'action' => 'index'
                    ],
                    'contraints' => [
                        'action' => '[a-zA-Z0-9_-]*'
                    ]
                ]
            ],
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\FormElementController::class => InvokableFactory::class,
            Controller\Test1Controller::class => InvokableFactory::class,
            Controller\InputFilterController::class => InvokableFactory::class,
            Controller\UploadFileController::class => InvokableFactory::class,
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view'
        ]
    ]
];
