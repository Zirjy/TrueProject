<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Siswa;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Siswa::factory(20)->create();
    }
}
