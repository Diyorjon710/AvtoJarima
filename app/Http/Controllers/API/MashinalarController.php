<?php

namespace App\Http\Controllers\API;

use App\Exports\CarsExport;
use App\Http\Controllers\Controller;
use App\Models\Mashinalar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;


class MashinalarController extends Controller
{
    public function export() {
        return Excel::download(new CarsExport, 'cars.xlsx');
    }

    public function search(Request $request) {
        $query = $request->get('query');

        $mashinalar = Mashinalar::select('mashinalar.*', 'viloyatlar.viloyat_nomi as viloyat_name','viloyatlar.viloyat_raqami' ,'tumanlar.tuman_nomi as tuman_name', 'maydonlar.maydon_nomi as maydon_name','maydonlar.maydon_lokatsiyasi')
            ->join('viloyatlar', 'mashinalar.viloyat_id', '=', 'viloyatlar.id')
            ->join('tumanlar', 'mashinalar.tuman_id', '=', 'tumanlar.id')
            ->join('maydonlar', 'mashinalar.maydon_id', '=', 'maydonlar.id')
            ->where('car_name', 'LIKE', "%{$query}%")
            ->orWhere('car_number', 'LIKE', "%{$query}%")
            ->orWhere('car_jarimasi', 'LIKE', "%{$query}%")
            ->orWhere('car_jarima_narxi', 'LIKE', "%{$query}%")
            ->orWhere('mashinalar.created_at', 'LIKE', "%{$query}%")
            ->orWhere('viloyatlar.viloyat_nomi', 'LIKE', "%{$query}%")
            ->orWhere('tumanlar.tuman_nomi', 'LIKE', "%{$query}%")
            ->orWhere('maydonlar.maydon_nomi', 'LIKE', "%{$query}%")
            ->get();

        if($mashinalar->isEmpty()) {
            return response([
                'data' => 'Not found',
                'status' => 'error',
            ], Response::HTTP_NOT_FOUND);
        } else {
            return response([
                'data' => $mashinalar,
                'status' => 'success',
            ], Response::HTTP_OK);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mashinalar = Mashinalar::select('mashinalar.*', 'viloyatlar.viloyat_nomi as viloyat_name','viloyatlar.viloyat_raqami' ,'tumanlar.tuman_nomi as tuman_name', 'maydonlar.maydon_nomi as maydon_name','maydonlar.maydon_lokatsiyasi')
            ->join('viloyatlar', 'mashinalar.viloyat_id', '=', 'viloyatlar.id')
            ->join('tumanlar', 'mashinalar.tuman_id', '=', 'tumanlar.id')
            ->join('maydonlar', 'mashinalar.maydon_id', '=', 'maydonlar.id')
            ->orderBy('mashinalar.id', 'ASC')->get();

         if($mashinalar->isEmpty()){
            return response([
                'data' => 'Not found',
                'status' => 'error',
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

        $image_name = $image->hashName();

        Storage::fake('public');
        Storage::disk('public')->put('assets/car-info-page/' , $image);

        $request->car_image->move(public_path('assets/car-info-page/'), $image_name);


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

        if(!$mashina) {
            return response([
                'status' => 'error',
                'message' => 'Mashina saqlanmadi'
            ], Response::HTTP_BAD_REQUEST);
        } else {
            return response([
                'status' => 'success',
                'message' => 'Mashina muvaffaqiyatli saqlandi',
                'product' => $mashina
            ], Response::HTTP_OK);
        }

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
        $image = $request->file('car_image');
        $image_name2 = $image->getClientOriginalName();
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
        $car = Mashinalar::find($id);

        File::delete(public_path('assets/car-info-page/' . $car->car_image));

        $car->delete();

        return response([
            'status' => 'success',
            'message' => 'Mashina muvaffaqiyatli o`chirildi',
            'product' => $car
        ], Response::HTTP_OK);
    }
}
