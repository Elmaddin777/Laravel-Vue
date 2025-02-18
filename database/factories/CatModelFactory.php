<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CatModel;
use Faker\Generator as Faker;

$factory->define(CatModel::class, function (Faker $faker) {
    $word = $faker->word;
    return [
        'name' => $word,
        'slug' => str_slug($word)
    ];
});
