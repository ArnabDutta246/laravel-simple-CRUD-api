<?php
 
use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
        'first_name'=>$faker->firstName,
        'last_name'=>$faker->lastName,
        'phone'=>$faker->phoneNumber,
        'eamil'=>$faker->safeEmail,
        'city'=>$faker->city,
    ];
});
