<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'license_number',
        'brand',
        'model',
        'year',
        'vin',
        'image',
        'driver_id',
        'tax_officer_id'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function taxOfficer()
    {
        return $this->belongsTo(TaxOfficer::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function taxes()
    {
        return $this->hasMany(Tax::class);
    }
}
