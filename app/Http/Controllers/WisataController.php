<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Pengelola;
use App\Models\Kategori;
use App\Models\htm;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class wisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Wisata::orderBy('id', 'desc')->get();
        return  view('wisata.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $kategori = Kategori::all();
        $pengelola = Pengelola::all();
        $htm = htm::all();
        return view('wisata.create', compact('kategori', 'pengelola', 'htm'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response 
     */

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required', 
            'nama' => 'required',
            'alamat' => 'required',
            'htm' => 'required',
        ],[
            'id.required' => 'ID Wajib diisi',
            'id.numeric' => 'ID wajib diisi dengan Angka',
            'id.primary' => 'ID Jangan diisi dengan Id yang sama',
            'nama.required' => 'Wajib diisi',
            'foto.required' => 'wajib diisi',
            'foto.mimes' => 'Foto hanya boleh jpg, jpeg, Png'
        ]);
        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') .".". $foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data= [
            'id' =>$request->id,
            'foto' =>$foto_nama,
            'status' =>$request->status,
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'htm' =>$request->htm,
        ];
        Wisata::create($data);
        return redirect()->to('Wisata')->with('success', 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $data = Wisata::findOrFail($id);

        return view('wisata.show', compact('wisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Wisata::where('id',$id)->first();
        return view('Wisata.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required', 
            'nama' => 'required',
            'alamat' => 'required',
            'htm' => 'required',
        ],[
            'nama.required' => 'Wajib diisi',
        ]);
        
        $data= [
            'status' =>$request->status,
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
        ];

        if($request->hasFile('foto')) {
            $request->validate([
                'foto' => '|mimes:jpg,jpeg,png'
            ],[
                'foto.mimes' => 'Foto Hanya Boleh Berkestensi JPG, JPEG, PNG'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') .".". $foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);

            $data_foto = Wisata::where('id', $id)->first();
            File::delete(public_path('foto'). '/' .$data_foto); 

            //$data = [
              //  'foto' => $foto_nama
            //];
            $data['foto'] = $foto_nama;
        }

        Wisata::where('id',$id)->update($data);
        return redirect()->to('Wisata')->with('success', 'Berhasil melakukakn Update Data');
    }

    /**
     * Remove the specified resource from storage.
     * * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wisata::where('id', $id)->first();
        File::delete(public_path('foto'). '/' . $data->foto);

        Wisata::where('id', $id)->delete();
        return redirect()->to('Wisata')->with('success', 'Berhasil melakukan Delete Data');
    }
}
