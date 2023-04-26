<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class FoydalanuvchilarController extends Controller
{
    public function search(Request $request) {
        $query = $request->get('query');

        $foydalanuvchilar = DB::table('users')
            ->join('viloyatlar', 'users.viloyat_id', '=', 'viloyatlar.id')
            ->join('tumanlar', 'users.tuman_id', '=', 'tumanlar.id')
            ->join('maydonlar', 'users.maydon_id', '=', 'maydonlar.id')
            ->where('users.name', 'LIKE', "%{$query}%")
            ->orWhere('users.surname', 'LIKE', "%{$query}%")
            ->orWhere('users.phone_number', 'LIKE', "%{$query}%")
            ->orWhere('users.username', 'LIKE', "%{$query}%")
            ->orWhere('users.password', 'LIKE', "%{$query}%")
            ->orWhere('users.role', 'LIKE', "%{$query}%")
            ->orWhere('users.permissions', 'LIKE', "%{$query}%")
            ->orWhere('users.created_at', 'LIKE', "%{$query}%")
            ->orWhere('viloyatlar.viloyat_nomi', 'LIKE', "%{$query}%")
            ->orWhere('tumanlar.tuman_nomi', 'LIKE', "%{$query}%")
            ->orWhere('maydonlar.maydon_nomi', 'LIKE', "%{$query}%")
            ->get();


        if($foydalanuvchilar->isEmpty()) {
            return response([
                'data' => 'Not found',
                'status' => 'error',
            ], Response::HTTP_NOT_FOUND);
        } else {
            return response([
                'data' => $foydalanuvchilar,
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
        $check_tuman = DB::table('users')
            ->join('tumanlar', 'users.tuman_id', '=', 'tumanlar.id')
            ->get();

        if($check_tuman->isEmpty()){
            $foydalanuvchilar = DB::table('users')
                ->join('viloyatlar', 'users.viloyat_id', '=', 'viloyatlar.id')
                ->get();
        } else {
            $foydalanuvchilar = DB::table('users')
                ->join('viloyatlar', 'users.viloyat_id', '=', 'viloyatlar.id')
                ->join('tumanlar', 'users.tuman_id', '=', 'tumanlar.id')
                ->join('maydonlar', 'users.maydon_id', '=', 'maydonlar.id')
                ->get();
        }

        if($foydalanuvchilar->isEmpty()){
            return response([
                'data' => 'Not found',
                'status' => 'errorww',
            ], Response::HTTP_NOT_FOUND);
        } else {
            return response([
                'data' => $foydalanuvchilar,
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
        //
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
        //
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
