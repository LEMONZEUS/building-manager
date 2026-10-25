<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = ['name', 'address', 'units'];

    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
}