<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    protected $fillable = ['building_id', 'title', 'description', 'status'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}