<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class SiswaController extends Controller
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
            'message' => 'Siswa list',
            'data' => Siswa::with('kelas', 'jurusan')->get(),
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

        $validated = $request->validate([
            'nis' => 'required',
            'nama_siswa' => 'required',
            'kelas_id' => 'required',
            'jurusan_id' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'agama' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengunggah file foto
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $nama_file = $foto->getClientOriginalName();

        // Simpan file foto ke direktori storage/app/public/fotosiswa
        $foto->storeAs('public/fotosiswa', $nama_file);
    }

        $siswa = Siswa::create([
            'id' => Uuid::uuid4()->toString(),
            'nis' => $validated['nis'],
            'nama_siswa' => $validated['nama_siswa'],
            'kelas_id' => $validated['kelas_id'],
            'jurusan_id' => $validated['jurusan_id'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'email' => $validated['email'],
            'agama' => $validated['agama'],
            'foto' => $nama_file,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Siswa created',
            'data' => $siswa
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
        // get data by uuid
        $siswa = Siswa::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Siswa',
            'data' => $siswa
        ], 200);
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
        // update data berdasarkan uuid
        $siswa = Siswa::where('id', $id)->first();
        $siswa->update([
            'id' => Uuid::uuid4()->toString(),
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'agama' => $request->agama,
            'foto' => $request->foto,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $siswa
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
        // hapus data berdasarkan uuid
        $siswa = Siswa::where('id', $id)->first();
        $siswa->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
        ], 200);
    }
}
