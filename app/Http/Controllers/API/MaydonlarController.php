<?php

namespace App\Http\Controllers\API;

use App\Exports\AreasExport;
use App\Http\Controllers\Controller;
use App\Models\Maydonlar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class MaydonlarController extends Controller
{
    public function export() {
        return Excel::download(new AreasExport, 'areas.xlsx');
    }

    public function search(Request $request) {
        $query = $request->get('query');

        $maydonlar = Maydonlar::select('maydonlar.*', 'viloyatlar.viloyat_nomi as viloyat_name','viloyatlar.viloyat_raqami' ,'tumanlar.tuman_nomi as tuman_name')
            ->join('tumanlar', 'maydonlar.tuman_id', '=', 'tumanlar.id')
            ->join('viloyatlar', 'tumanlar.viloyat_id', '=', 'viloyatlar.id')
            ->where('maydon_nomi', 'LIKE', "%{$query}%")
            ->orWhere('maydon_lokatsiyasi', 'LIKE', "%{$query}%")
            ->orWhere('maydonlar.created_at', 'LIKE', "%{$query}%")
            ->orWhere('tumanlar.tuman_nomi', 'LIKE', "%{$query}%")
            ->get();

        if($maydonlar->isEmpty()) {
            return response([
                'data' => 'Not found',
                'status' => 'error',
            ], Response::HTTP_NOT_FOUND);
        } else {
            return response([
                'data' => $maydonlar,
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
        $maydonlar = Maydonlar::select('maydonlar.*', 'viloyatlar.viloyat_nomi as viloyat_name','viloyatlar.viloyat_raqami' ,'tumanlar.tuman_nomi as tuman_name')
            ->join('tumanlar', 'maydonlar.tuman_id', '=', 'tumanlar.id')
            ->join('viloyatlar', 'tumanlar.viloyat_id', '=', 'viloyatlar.id')
            ->get();

        if($maydonlar->isEmpty()){
            return response([
                'data' => 'Not found',
                'status' => 'error',
            ], Response::HTTP_NOT_FOUND);
        } else {
            return response([
                'data' => $maydonlar,
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
        $nomi = $request->get('maydon_nomi');
        $lokatsiyasi = $request->get('maydon_lokatsiyasi');
        $tuman_id = $request->get('tuman_id');

        $maydon = Maydonlar::create([
            'maydon_nomi' => $nomi,
            'maydon_lokatsiyasi' => $lokatsiyasi,
            'tuman_id' => $tuman_id,
        ]);

        if($maydon) {
            return response([
                'data' => $maydon,
                'status' => 'success',
            ], Response::HTTP_CREATED);
        } else {
            return response([
                'data' => 'Not found',
                'status' => 'error',
            ], Response::HTTP_NOT_FOUND);
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
        DB::table('maydonlar')
            ->where('id', $id)
            ->update([
                'maydon_nomi' => $request->get('maydon_nomi'),
                'maydon_lokatsiyasi' => $request->get('maydon_lokatsiyasi'),
                'tuman_id' => $request->get('tuman_id'),
            ]);

        $maydon = Maydonlar::find($id);

        return response([
            'data' => $maydon,
            'status' => 'success',
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
        Maydonlar::destroy($id);

        return response([
            'data' => 'Deleted',
            'status' => 'success',
        ], Response::HTTP_OK);
    }
}
