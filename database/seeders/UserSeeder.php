<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ryo Otwell',
            'email' => 'admin@ryodev.my.id',
            'password' => bcrypt('123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Naruto',
            'email' => 'naruto@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Lutfy',
            'email' => 'lutfy@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'user',
        ]);
    }
}
