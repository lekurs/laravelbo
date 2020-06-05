<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Entity\Client;
use App\Http\Entity\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {

    $client = Client::with('contacts')->inRandomOrder()->first();
//    $estimation = Estimation::with('invoices')->inRandomOrder()->first();
//    $in = Client::with('estimations')->inRandomOrder()->first();
//    if (!empty($client->contacts()->inRandomOrder()->first())) {
//        $contact = $client->contacts()->inRandomOrder()->first()->id;
//    } else {
//        $contact = 1;
//    }
//    dd($client->contacts()->inRandomOrder()->first()->id);

    return [
        'number' => $faker->randomNumber(6),
        'title' => $faker->text(50),
        'amount' => $faker->randomFloat('2', 1, 6000),
        'paid' => $faker->boolean,
        'client_id' => $client->id,
//        'contact_id' => $contact
    ];
});
