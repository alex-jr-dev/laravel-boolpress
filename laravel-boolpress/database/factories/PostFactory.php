<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),  // Random task title
        'content' => $faker->realText(500),
        'slug' => $faker->slug(),
        'user_id' => 1
    ];
});
