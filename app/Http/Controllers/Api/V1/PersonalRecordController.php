<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Movement;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class PersonalRecordController extends Controller
{
    public function index(string $movement_id)
    {
        try {
            $movement_name = Movement::where('movement_id', $movement_id)->value('name');

            if (is_null($movement_name)) {
                return response()->json(['error' => 'Movement not found.'], 404);
            }

            $pr_results = DB::table('personal_record as pr')
                ->select(
                    'user.name as user_name',
                    DB::raw('MAX(pr.value) as personal_record'),
                    DB::raw('DENSE_RANK() OVER (ORDER BY MAX(pr.value) DESC) as position'),
                    DB::raw('MAX(pr.date) as date'),
                )
                ->join('user', 'pr.user_id', '=', 'user.user_id')
                ->where('pr.movement_id', $movement_id)
                ->groupBy('pr.user_id', 'user.name')
                ->orderByDesc('personal_record')
                ->get();

            $response = collect([
                'movement' => $movement_name,
                'ranking' => $pr_results->map(function ($item) {
                    return [
                        'user_name' => $item->user_name,
                        'max_value' => $item->personal_record,
                        'position' => $item->position,
                        'date' => Carbon::parse($item->date)->format('d/m/Y H:i:s'),
                    ];
                }),
            ]);

            return $response;
        } catch (Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
}
