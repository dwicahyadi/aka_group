<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'detail',
        'vehicle_id',
        'cost',
        'next_service_date',
        'note'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public static function upcomingServices($days = 3)
    {
        $model = new Service();
        $date = Carbon::now();
        return $model->whereBetween('next_service_date',[$date->format('Y-m-d'), $date->add('days',$days)->format('Y-m-d')]);
    }
}
