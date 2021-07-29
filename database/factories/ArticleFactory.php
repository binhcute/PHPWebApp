<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'article_name' => $faker->catchPhrase,
        'article_keyword' => $faker->word,
        'article_img' => 'blog.jpg',
        'article_description' => $faker->text($maxNbChars = 255),
        'status' => 1,
    ];
});
