<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        User::create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
            'roles' => 'Admin',
            'status' => 'WNI',
            'telepon' => '0812345678',
        ]);
    }
}
