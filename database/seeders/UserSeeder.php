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
            'email' => 'ytryo789@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'user',
        ]);
    }
}
