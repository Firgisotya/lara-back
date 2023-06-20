<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Kelas list',
            'data' => Kelas::all()
        ], 200);
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
        $validateData = $request->validate([
            'nama_kelas' => 'required|max:255',
            'kode_kelas' => 'required|max:255',
        ]);

        $kelas = Kelas::create([
            'id' => Uuid::uuid4()->toString(),
            'nama_kelas' => $validateData['nama_kelas'],
            'kode_kelas' => $validateData['kode_kelas'],
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Kelas created',
            'data' => $kelas
        ], 201);
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
        $kelas = Kelas::where('id', $id)->first();
        $kelas->update([
            'id' => Uuid::uuid4()->toString(),
            'nama_kelas' => $request->nama_kelas,
            'kode_kelas' => $request->kode_kelas,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Kelas updated',
            'data' => $kelas
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Kelas deleted',
        ], 200);
    }
}
