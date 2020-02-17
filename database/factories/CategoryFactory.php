<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title'           => $slug = $faker->sentence(1),
        'slug'            => Str::slug($slug),
        'class'           => $faker->randomElement(['primary', 'warning', 'danger', 'success', 'secondary']),
        'color'           => $faker->safeColorName,
        'active'          => rand(0, 1),
        'position'        => $faker->numberBetween(1, 10),
        'img'             => 'fake_images/'.rand(1, 33).'.webp',
        'alt_img'         => $faker->sentence(),
        'seo_description' => $faker->text(190),
        'seo_keywords'    => $faker->text(190),
        'description'     => $faker->text(190),
        'text'            => $faker->text(600),
        'keywords'        => $faker->text(190),
    ];
});
