<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->word,
        'body' => $faker->text,
        'is_approved' => true,
        'category_id' => factory(Category::class),
        'creator_id' => 1
    ];
});
