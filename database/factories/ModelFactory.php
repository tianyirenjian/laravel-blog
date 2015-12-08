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
    /*return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];*/
    return [
        'name' => 'Goenitz',
        'email' => '179063828@qq.com',
        'password' => bcrypt('password'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Setting::class,function(Faker\Generator $faker){
    return [
        'webname'=>'Goenitz',
        'keywords'=>'Goenitz,Php,laravel',
        'description'=>'Goenitz 个人空间'
    ];
});

$factory->define(App\Profile::class,function(Faker\Generator $faker){
    return [
        'avatar'=>'/images/673c0cd78d6356b5229f0ac0be69bc07.jpg',
        'user_id'=>1
    ];
});