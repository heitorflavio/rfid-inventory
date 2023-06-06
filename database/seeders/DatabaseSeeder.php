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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'ADM',
            'email' => 'adm@adm.com',
            'tag' => '23 c9 c0 a0',
            'password' => bcrypt('123456'),
        ]);

        \App\Models\TagMestre::factory()->create([
            'hash' => '23 c9 c0 a0',
            'status' => '1',
        ]);
    }
}
