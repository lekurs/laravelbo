<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create => sauvegarde en bdd / make => crée à la volée sans save en bdd
        factory(Client::class, 50)->create();
    }
}
