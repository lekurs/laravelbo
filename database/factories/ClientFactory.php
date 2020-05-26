<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Entity\Client;
use Faker\Generator as Faker;
use Faker\Provider\fr_FR\Company;
use Faker\Provider\fr_FR\PhoneNumber;
use Illuminate\Support\Str;

$factory->define(Client::class, function (Faker $faker) {
    $faker->addProvider(new Company($faker));
    $faker->addProvider(new PhoneNumber($faker));

    $name = $faker->name;
    $phone = str_replace(' ', '', $faker->e164PhoneNumber);

    return [
        'name' => $name,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'zip' => 78000,
        'city' => $faker->city,
        'siren' => $faker->siren,
        'slug' => Str::slug($name)
    ];
});
