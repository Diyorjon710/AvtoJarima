<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller
{
    public function index(Request $request) {
        $mainNumber = $request->get('main-number');
        $countryCode = $request->get('country-code');

        $query = DB::table('mashinalar')
            ->where('car_number', 'like', "%{$mainNumber}%")
            ->join('viloyatlar', 'mashinalar.viloyat_id', '=', 'viloyatlar.id')
            ->join('tumanlar', 'mashinalar.tuman_id', '=', 'tumanlar.id')
            ->join('maydonlar', 'mashinalar.maydon_id', '=', 'maydonlar.id')
            ->where('viloyatlar.viloyat_nomi', 'like', "%{$countryCode}%")
            ->get();

        if($query->isEmpty()){
            return response([
                'data' => 'Not found',
                'status' => 'error',
            ], Response::HTTP_NOT_FOUND);
        } else {
            return response([
                'data' => $query,
                'status' => 'success1',
            ], Response::HTTP_OK);
        }
    }
}
