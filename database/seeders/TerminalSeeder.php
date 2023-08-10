<?php

namespace Database\Seeders;

use App\Models\Terminal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Terminal::create([
            'id' => 1,
            'nombre_terminal' => 'Area Cochera',
            'created_at' => now()
        ]);

        Terminal::create([
            'id' => 2,
            'nombre_terminal' => 'Area Almacen',
            'created_at' => now()
        ]);

        Terminal::create([
            'id' => 3,
            'nombre_terminal' => 'Area Patio',
            'created_at' => now()
        ]);
    }
}
