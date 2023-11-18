<?php

namespace Database\Factories;

use App\Chair as AppChair;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $now = now()->addHours( - (rand(10, 999)) );
        // $now = now();

        $year = $now->format('Y');
        $day = $now->format('d');
        $month = $now->format('m');
        $shift = Arr::random([
            'a',
            'b',
            'c',
            'd'
        ], 1)[0];
        $getShiftAt = AppChair::getShift($shift);

        $from = Carbon::create($year, $month, $day, $getShiftAt['from']);
        $to = Carbon::create($year, $month, $day, $getShiftAt['to']);

        return [
            'user_id' => rand(1, User::count()),
            'chair_id' => rand(1, 45),
            'shift' => $shift,
            'from' => $from,
            'to' => $to,
            'status' => 'approved',
            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}
