<?php

return [
    '__name' => 'content-pricing',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/content-pricing.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/content-pricing' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-model' => NULL
            ],
            [
                'lib-formatter' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'ContentPricing\\Model' => [
                'type' => 'file',
                'base' => 'modules/content-pricing/model'
            ]
        ],
        'files' => []
    ],
    'libEnum' => [
        'enums' => [
            'content-pricing.type' => [
                'post' => 'Post'
            ]
        ]
    ],
    'libFormatter' => [
        'formats' => [
            'content-pricing' => [
                'id' => [
                    'type' => 'number'
                ],
                'user' => [
                    'type' => 'object',
                    'model' => [
                        'name'  => 'LibUser\\Library\\Fetcher',
                        'field' => 'id',
                        'type'  => 'number'
                    ],
                    'format' => 'user'
                ],
                'creator' => [
                    'type' => 'object',
                    'model' => [
                        'name'  => 'LibUser\\Library\\Fetcher',
                        'field' => 'id',
                        'type'  => 'number'
                    ],
                    'format' => 'user'
                ],
                'object' => [
                    'type' => 'object-switch',
                    'field' => 'type',
                    'cases' => []
                ],
                'type' => [
                    'type' => 'text'
                ],
                'price' => [
                    'type' => 'number'
                ],
                'month' => [
                    'type' => 'date'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ]
        ]
    ],
    'contentPricing' => []
];