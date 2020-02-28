<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{Post, Category, User};
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'           => $slug = $faker->sentence(),
        'slug'            => Str::slug($slug),
        'img'             => 'fake_images/'.rand(1, 33).'.jpg',
        'alt_img'         => $faker->sentence(),
        'category_id'     => Category::all()->random()->id,
        'author_id'       => User::all()->random()->id,
        'active'          => rand(0, 1),
        'views'          => rand(0, 111),
        'description'     => $faker->text(190),
        'seo_description' => $faker->text(190),
        'seo_keywords'    => $faker->text(190),
        'text'            => $faker->text(10000),
    ];
});
