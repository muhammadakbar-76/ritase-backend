<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Unit;

class UnitAPIController extends Controller
{
    public function all()
    {
        return ResponseFormatter::success(Unit::all(), 'Ok');
    }
}
