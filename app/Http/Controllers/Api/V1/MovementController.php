<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Movement;
use Exception;

class MovementController extends Controller
{
    public function index()
    {
        try {

            $response = Movement::all();

            $response = collect($response)->map(function ($item) {
                return [
                    'movement_id' => $item->movement_id,
                    'name' => $item->name,
                ];
            });

            return collect($response);
        } catch (Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
}
