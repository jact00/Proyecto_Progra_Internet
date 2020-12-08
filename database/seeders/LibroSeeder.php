<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;
use App\Models\Ejemplar;
use Illuminate\Database\Eloquent\Factories\Sequence;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Libro::factory()
        	->count(10)
        	->has(
        		Ejemplar::factory()
        			->count(8)
        			->state(new Sequence(
        				['en_prestamo' => 0],
        				['en_prestamo' => 1],
        			)),
        		'ejemplares'
        	)
        	->create();
    }
}
