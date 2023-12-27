<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Root',
            'username' => 'root',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345'),
            'role' => 'Admin',
            'jkelamin' => 'lk',
            'tgl_lahir' => '06/18/2021',
            'alamat' => 'Pekanbaru',
            'pekerjaan' => 'Wirausaha',
            'no_hp' => '08521234'

        ]);
    }
}
