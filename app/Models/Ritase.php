<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ritase extends Model
{
    use HasFactory;

    protected $guarded = ['ritase_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'kode_unit');
    }
}
