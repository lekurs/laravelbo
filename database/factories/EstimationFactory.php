<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Entity\Client;
use App\Http\Entity\Estimation;
use Faker\Generator as Faker;

$factory->define(Estimation::class, function (Faker $faker) {

    $client = Client::with('contacts')->inRandomOrder()->first();
    if (!empty($client->contacts()->inRandomOrder()->first())) {
        $contact = $client->contacts()->inRandomOrder()->first()->id;
    } else {
        $contact = 1;
    }
//    dd($client->contacts()->inRandomOrder()->first()->id);

    return [
        'number' => $faker->randomNumber(6),
        'title' => $faker->text(50),
        'body' => $faker->realText(),
        'price' => $faker->randomFloat('2', 1, 6000),
        'validation' => $faker->boolean,
        'client_id' => $client->id,
        'contact_id' => $contact
    ];
});
