<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    $last_name = $faker->lastName;
    return [
        'name' => $name,
        'role_id' => \App\Role::all()->random()->id,
        'last_name' => $last_name,
        'slug' => str_slug($name ." ". $last_name,'-'),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$10$nVl.mYQXtv/8kbQ9HVtn1eKtOrLMG4eE7sBUlhiLHppxh5s0e1LCO', // password
        'remember_token' => Str::random(10),
        'picture' => \Faker\Provider\Image::image(storage_path().'/app/public/users',200,200,'people',false),
    ];
});
