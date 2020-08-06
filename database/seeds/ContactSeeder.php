<?php

use App\Http\Entity\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create => sauvegarde en bdd / make => crée à la volée sans save en bdd
        factory(Contact::class, 150)->create();
    }
}
