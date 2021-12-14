<?php

return [
    'ContentPricing\\Model\\Pricing' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'primary_key' => TRUE,
                    'auto_increment' => TRUE
                ],
                'index' => 1000
            ],
            'user' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'null' => FALSE
                ],
                'index' => 2000
            ],
            'creator' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => TRUE,
                    'null' => FALSE
                ],
                'index' => 3000
            ],
            'object' => [
                'type' => 'BIGINT',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false
                ],
                'index' => 4000
            ],
            'type' => [
                'type' => 'VARCHAR',
                'length' => 20,
                'attrs' => [
                    'null' => false
                ],
                'index' => 5000
            ],
            'price' => [
                'type' => 'DOUBLE',
                'length' => '13,2',
                'attrs' => [
                    'unsigned' => true,
                    'null' => false
                ],
                'index' => 6000
            ],
            'month' => [
                'type' => 'DATE',
                'attrs' => [
                    'null' => false
                ],
                'index' => 7000
            ],
            'updated' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP',
                    'update' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 10000
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ],
                'index' => 11000
            ]
        ],
        'indexes' => [
            'by_object' => [
                'fields' => [
                    'object' => []
                ]
            ]
        ]
    ]
];
