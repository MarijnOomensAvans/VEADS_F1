<?php

use Faker\Generator as Faker;

$factory->define(App\ContactForm::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'question' => $faker->realText(1000)
    ];
});
