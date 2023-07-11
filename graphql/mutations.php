<?php

use GraphQL\Type\Definition\ObjectType;

require 'mutations/userMutations.php';
require 'mutations/addressMutations.php';

$mutations = array_merge($userMutations, $addressMutations);

$rootMutation = new ObjectType([
    'name' => 'Mutation',
    'fields' => $mutations
]);
