<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'vehicle_id',
        'cost',
        'next_tax_date',
        'note'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public static function upcomingTaxes($days = 3)
    {
        $model = new Tax();
        $date = Carbon::now();
        return $model->whereBetween('next_tax_date',[$date->format('Y-m-d'), $date->add('days',$days)->format('Y-m-d')]);
    }
}
