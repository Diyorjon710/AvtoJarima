<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mashinalar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;


class MashinalarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mashinalar = DB::table('mashinalar')
            ->join('viloyatlar', 'mashinalar.viloyat_id', '=', 'viloyatlar.id')
            ->join('tumanlar', 'mashinalar.tuman_id', '=', 'tumanlar.id')
            ->join('maydonlar', 'mashinalar.maydon_id', '=', 'maydonlar.id')
            ->get();

         if($mashinalar->isEmpty()){
            return response([
                'data' => 'Not found',
                'status' => 'errorwwww',
            ], Response::HTTP_NOT_FOUND);
         } else {
            return response([
                'data' => $mashinalar,
                'status' => 'success',
            ], Response::HTTP_OK);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('car_name');
        $number = $request->get('car_number');
        $jarimasi = $request->get('car_jarimasi');
        $jarima_narxi = $request->get('car_jarima_narxi');
        $image = $request->file('car_image');
        $maydon_id = $request->get('maydon_id');
        $tuman_id = $request->get('tuman_id');
        $viloyat_id = $request->get('viloyat_id');

        $image_name = time() . '.' . $image->getClientOriginalName();
        $request->car_image->move(public_path('assets/car-info-page'), $image_name);

        $mashina = Mashinalar::create([
            'car_name' => $name,
            'car_number' => $number,
            'car_jarimasi' => $jarimasi,
            'car_jarima_narxi' => $jarima_narxi,
            'car_image' => $image_name,
            'maydon_id' => $maydon_id,
            'tuman_id' => $tuman_id,
            'viloyat_id' => $viloyat_id
        ]);

        return response([
            'status' => 'success',
            'message' => 'Mashina muvaffaqiyatli saqlandi',
            'product' => $mashina
        ], Response::HTTP_OK);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->get('car_image');
//        dd($image);
        $image_name2 = time() . '.' . $image->getClientOriginalName();
        $request->car_image->move(public_path('assets/car-info-page/'), $image_name2);

        $car = Mashinalar::find($id);

        File::delete(public_path('assets/car-info-page/' . $car->car_image));

        $car->car_name = $request->get('car_name');
        $car->car_number = $request->get('car_number');
        $car->car_jarimasi = $request->get('car_jarimasi');
        $car->car_jarima_narxi = $request->get('car_jarima_narxi');
        $car->car_image = $image_name2;
        $car->maydon_id = $request->get('maydon_id');
        $car->tuman_id = $request->get('tuman_id');
        $car->viloyat_id = $request->get('viloyat_id');
        $car->save();

        return response([
            'status' => 'success',
            'message' => 'Mashina muvaffaqiyatli yangilandi',
            'product' => $car
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
