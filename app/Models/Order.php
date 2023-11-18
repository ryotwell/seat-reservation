<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, Uuids;

    protected $with = ['chair'];

    protected $guarded = [];

    protected $dates = ['from', 'to'];

    public function chair()
    {
        return $this->belongsTo(Chair::class);
    }
}
