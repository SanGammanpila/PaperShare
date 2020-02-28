<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'=>$faker->word,
        'article_type' =>$faker->numberBetween(1,4),
        'abstract' => $faker->paragraphs(3,true),
    ];
});
