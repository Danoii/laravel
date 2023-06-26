<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pengelola;
use App\Models\Kategori;
use App\Models\Htm;


class KategoriController extends Controller
{
    public function index()
    {
        $data = Kategori::orderBy('id', 'desc')->get();
        return  view('kategori.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $kategori = Kategori::all();
        $pengelola = Pengelola::all();
        $htm = htm::all();
        return view('create', compact('kategori', 'pengelola', 'htm'));
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
            'kategori' => 'required',
            'pengelola' => 'required',
        ],[
            'id.required' => 'ID Wajib diisi',
            'kategori.required' => 'ID wajib diisi dengan Angka',
            'pengelola.required' => 'Wajib diisi',
        ]);
        

        $data= [
            'id' =>$request->id,
            'kategori' =>$request->kategori,
            'pengelola' =>$request->pengelola,
        ];
        Kategori::create($data);
        return redirect()->to('kategori')->with('success', 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Kategori::where('id',$id)->first();
        return view('Kategori.kat-edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'kategori' => 'required', 
            'pengelola' => 'required',
        ],[
            'id.required' => 'ID Wajib diisi',
            'kategori.required' => 'Wajib diisi',
            'pengelola.required' => 'Wajib diisi',
        ]);
        
        $data= [
            'kategori' =>$request->kategori,
            'pengelola' =>$request->pengelola,
        ];

        Kategori::where('id',$id)->update($data);
        return redirect()->to('Kategori')->with('success', 'Berhasil melakukakn Update Data');
    }

    /**
     * Remove the specified resource from storage.
     * * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::where('id', $id)->delete();
        return redirect()->to('Kategori')->with('success', 'Berhasil melakukan Delete Data');
    }
}
