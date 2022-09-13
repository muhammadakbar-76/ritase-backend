<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Ritase;
use Exception;
use Illuminate\Http\Request;

//I don't have time to figuring out how to processing data as json.. ah, i miss nestjs already

class RitaseAPIController extends Controller
{
    public function all()
    {
        return ResponseFormatter::success(Ritase::all(), 'Ok');
    }

    public function create(Request $request)
    {
        try {
            $validatedRequest = $request->validate([
                'ritase_date' => 'nullable|date',
                'ritase_time' => 'nullable|string',
                'ritase_material' => 'required|string|max:50',
                'ritase_kategori' => 'required|string|max:50',
                'ritase_keterangan' => 'required|string|max:1000',
                'kode_unit' => 'required|integer'
            ]);

            $validatedRequest['ritase_date'] = date('Y-m-d', time());
            $validatedRequest['ritase_time'] = date('h:i a', time());

            Ritase::create($validatedRequest);

            return ResponseFormatter::success($validatedRequest, 'Ritase has been created successfully');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                "message" => $error->getMessage(),
                "error" => $error
            ], "Something went wrong", 500);
        }
    }

    public function edit(Request $request, int $ritase_id)
    {
        try {
            $validatedRequest = $request->validate([
                'ritase_date' => 'nullable|date',
                'ritase_time' => 'nullable|regex:([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?',
                'ritase_material' => 'required|string|max:50',
                'ritase_kategori' => 'required|string|max:50',
                'ritase_keterangan' => 'required|string|max:1000',
                'kode_unit' => 'required|integer'
            ]);

            $validatedRequest['ritase_date'] = date('Y-m-d', time());
            $validatedRequest['ritase_time'] = date('H:i:s', time());

            Ritase::where('ritase_id', $ritase_id)
                ->update($validatedRequest);

            return ResponseFormatter::success($validatedRequest, 'Ritase has been updated successfully');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                "message" => $error->getMessage(),
                "error" => $error
            ], "Something went wrong", 500);
        }
    }

    public function delete(int $ritase_id)
    {
        $isDeleted = Ritase::where('ritase_id', $ritase_id)->delete();

        if (!$isDeleted) {
            return ResponseFormatter::error(null, "Data doesn't exist");
        }

        return ResponseFormatter::success(null, 'Ritase has been deleted successfully');
    }
}
