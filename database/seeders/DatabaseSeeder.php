<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Aqui lo que hago es llamar a este archivo que es donde se controlan todos los seeders a el seeder NoteSeeder
        $this->call(NoteSeeder::class);
    }
}
