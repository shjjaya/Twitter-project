<?php

use Faker\Generator as Faker;

$factory->define(App\Like::class, function (Faker $faker) {
    static $types = ['App\Comment', 'App\Post', 'App\Post'];
    return [
        'user_id'       =>  mt_rand(1, $GLOBALS['userCount']),
        'likeable_id'   =>  mt_rand(1, $GLOBALS['postCount']),
        'likeable_type' =>  $types[mt_rand(0,2)]
    ];
});
