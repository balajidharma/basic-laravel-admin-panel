<?php

return [
    'models' => [
        'reaction' => BalajiDharma\LaravelReaction\Models\Reaction::class,
    ],

    'table_names' => [
        'reactions' => 'reactions',
    ],

    'reaction_types' => [
        [
            'name' => 'likes',
            'options' => [
                [
                    'name' => 'like',
                    'value' => 1,
                ],
                [
                    'name' => 'unlike',
                    'value' => -1,
                ],
            ],
        ],
        [
            'name' => 'stars',
            'min' => 1,
            'max' => 5,
            'options' => [
                [
                    'name' => 'star',
                    'value' => 1,
                ],
            ],
        ],
        [
            'name' => 'comment_reaction',
            'options' => [
                [
                    'name' => 'like',
                    'value' => 1,
                ],
                [
                    'name' => 'helpful',
                    'value' => 1,
                ],
                [
                    'name' => 'funny',
                    'value' => 1,
                ],
                [
                    'name' => 'unlike',
                    'value' => -1,
                ],
            ],
        ],
    ],
];
