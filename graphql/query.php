<?php

use App\Models\Address;
use App\Models\User;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$rootQuery = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'user' => [
            'type' => $userType,
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],
            'resolve' => function($root, $args) {
                return User::find($args['id'])->toArray();
            }
        ],
        'users' => [
            'type' => Type::listOf($userType),
            'resolve' => function($root, $args) {
                return User::get()->toArray();
            }
        ],
        'address' => [
            'type' => $addressType,
            'args' => [
                'id' => Type::nonNull(Type::int())
            ],
            'resolve' => function($root, $args) {
                return Address::find($args['id'])->toArray();
            }
        ]
    ]
]);
