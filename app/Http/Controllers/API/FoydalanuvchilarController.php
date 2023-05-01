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
        $foydalanuvchilar = DB::table('users')
            ->join('viloyatlar', 'users.viloyat_id', '=', 'viloyatlar.id')
            ->join('tumanlar', 'users.tuman_id', '=', 'tumanlar.id')
            ->join('maydonlar', 'users.maydon_id', '=', 'maydonlar.id')
            ->get();

        if($foydalanuvchilar->isEmpty()){
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
     * Show the form for creating a new resource.
     *
     * @return void
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
        $user = $request->get('user');

        $foydalanuvchi = User::create([
            'name' => $user['name'],
            'surname' => $user['surname'],
            'phone_number' => $user['phone_number'],
            'username' => $user['username'],
            'password' => $user['password'],
            'role' => $user['role'],
            'permissions' => implode(',', $user['permissions']),
            'viloyat_id' => $user['viloyat_nomi'],
            'tuman_id' => $user['tuman_nomi'],
            'maydon_id' => $user['maydon_nomi'],
        ]);

        if($foydalanuvchi) {
            return response([
                'data' => $foydalanuvchi,
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
        $user = $request->get('user');

        $foydalanuvchi = User::find($id);

        if($foydalanuvchi) {
            $foydalanuvchi->name = $user['name'];
            $foydalanuvchi->surname = $user['surname'];
            $foydalanuvchi->phone_number = $user['phone_number'];
            $foydalanuvchi->username = $user['username'];
            $foydalanuvchi->password = $user['password'];
            $foydalanuvchi->role = $user['role'];
            $foydalanuvchi->permissions = implode(',', $user['permissions']);
            $foydalanuvchi->viloyat_id = $user['viloyat_nomi'];
            $foydalanuvchi->tuman_id = $user['tuman_nomi'];
            $foydalanuvchi->maydon_id = $user['maydon_nomi'];
            $foydalanuvchi->save();

            return response([
                'data' => $foydalanuvchi,
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
