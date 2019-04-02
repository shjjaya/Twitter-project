<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id'   =>  mt_rand(1, $GLOBALS['userCount']),
        'body'      =>  $faker->realText(mt_rand(80, 400))
    ];
});
