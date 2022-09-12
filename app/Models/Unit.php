<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = ['unit_kode'];

    public function ritase()
    {
        return $this->hasMany(Ritase::class);
    }

    public function getRouteKeyName()
    {
        return 'unit_kode';
    }
}
