<?php

namespace App;

use App\Models\Chair as ModelsChair;
use App\Models\Order;
use Carbon\Carbon;

class Chair
{
    public static $shifts = [
        'a' => [ 'from' => '08', 'to' => '10' ],
        'b' => [ 'from' => '10', 'to' => '12' ],
        'c' => [ 'from' => '12', 'to' => '14' ],
        'd' => [ 'from' => '14', 'to' => '16' ],
    ];

    public static function hasNewOrder($chair_id, $shift)
    {
        $order = Order::whereDate('from', now()->today())
            ->whereBetween('from', [now(), now()])
            ->where('shift', $shift)
            ->where('chair_id', $chair_id)
            ->first();

        return empty($order);

        return empty( Order::whereYear('created_at', now()->year)->whereMonth('created_at', now()->month)->whereDay('created_at', now()->day)->where('chair_id', $chair_id)->where('shift', $shift)->first() );
    }

    public static function format($date)
    {
        return $date->format('d F, Y H:i');
    }

    public static function getShift($shift)
    {
        return static::$shifts[$shift];
    }

    public static function getShiftAt($shift)
    {
        $shift = static::getShift($shift);
        $from = static::create($shift['from']);
        $to = static::create($shift['to']);

        return [
            'from' => $from,
            'to' => $to,
        ];
    }

    public static function create($hour, $minute = 0)
    {
        $year = now()->format('Y');
        $month = now()->format('m');
        $day = now()->format('d');

        return Carbon::create($year, $month, $day, $hour, $minute);
    }

    public static function generate(string $category)
    {
        $chairs = [
            [
                'category' => $category,
                'name' => '1',
            ],
            [
                'category' => $category,
                'name' => '2',
            ],
            [
                'category' => $category,
                'name' => '3',
            ],
            [
                'category' => $category,
                'name' => '4',
            ],
            [
                'category' => $category,
                'name' => '5',
            ],
            [
                'category' => $category,
                'name' => '6',
            ],
            [
                'category' => $category,
                'name' => '7',
            ],
            [
                'category' => $category,
                'name' => '8',
            ],
            [
                'category' => $category,
                'name' => '9',
            ],
            // [
            //     'category' => $category,
            //     'name' => '10',
            // ],
            // [
            //     'category' => $category,
            //     'name' => '11',
            // ],
            // [
            //     'category' => $category,
            //     'name' => '12',
            // ],
            // [
            //     'category' => $category,
            //     'name' => '13',
            // ],
            // [
            //     'category' => $category,
            //     'name' => '14',
            // ],
            // [
            //     'category' => $category,
            //     'name' => '15',
            // ],
        ];

        foreach($chairs as $chair) {
            ModelsChair::create(['category' => $chair['category'], 'name' => $chair['name']]);
        }

        return $chairs;
    }
}