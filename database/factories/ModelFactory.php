<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

\Faker\Factory::create('pt_BR');
$factory->define(Modules\Blog\Entities\Post::class, function (Faker\Generator $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'description' => $faker->paragraph,
        'content' => $faker->paragraph,
        'slug' =>  str_slug($title, '-'),
        'users_id' => rand(1,2)
    ];
});

$factory->define(Modules\Blog\Entities\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

