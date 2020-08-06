<?php

use App\Http\Entity\Invoice;
use Illuminate\Database\Seeder;

class InvoicenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create => sauvegarde en bdd / make => crée à la volée sans save en bdd
        factory(Invoice::class, 100)->create();
    }
}
