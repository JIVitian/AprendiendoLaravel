<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $curso = new Curso();

        $curso->name = "Laravel";
        $curso->description = "El mejor framework de php";
        $curso->category = "Desarrollo web";

        $curso->save();

        $curso2 = new Curso();

        $curso2->name = "Laravel";
        $curso2->description = "El mejor framework de php";
        $curso2->category = "Desarrollo web";

        $curso2->save();

        $curso3 = new Curso();

        $curso3->name = "Laravel";
        $curso3->description = "El mejor framework de php";
        $curso3->category = "Desarrollo web";

        $curso3->save();
    }
}
