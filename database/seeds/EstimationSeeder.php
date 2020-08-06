<?php

use App\Http\Entity\Estimation;
use Illuminate\Database\Seeder;

class EstimationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create => sauvegarde en bdd / make => crée à la volée sans save en bdd
        factory(Estimation::class, 150)->create();
    }
}
