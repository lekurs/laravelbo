<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Entity\Client;
use App\Http\Entity\Contact;
use Faker\Generator as Faker;
use Faker\Provider\fr_FR\PhoneNumber;
use Illuminate\Support\Str;

$factory->define(Contact::class, function (Faker $faker) {
    $faker->addProvider(new PhoneNumber($faker));

    $name = $faker->name;
    $phone = str_replace(' ', '', $faker->e164PhoneNumber);
    return [
        'name' => $name,
        'lastname' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $phone,
        'slug' => Str::slug($name),
        'client_id' => Client::inRandomOrder()->first()->id
    ];
});
