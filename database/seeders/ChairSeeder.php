<?php

namespace Database\Seeders;

use App\Chair as AppChair;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppChair::generate('A');
        AppChair::generate('B');
        AppChair::generate('C');
        AppChair::generate('D');
        AppChair::generate('E');
    }
}
