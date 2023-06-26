<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Pengelola;
use App\Models\Kategori;
use App\Models\Wisata;
use App\Models\Htm;

class PengelolaController extends Controller
{
    public function index()
    {
        $pengelola = Pengelola::orderBy('id', 'desc')->get();
        return  view('wisata.pengelola')->with('data', $pengelola);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $pengelola = Pengelola::all();
        $kategori = Kategori::all();
        $htm = htm::all();
        return view('wisata.peng-add', compact('pengelola', 'kategori', 'htm'));
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
            'pengelola' => 'required',
            'htm' => 'required',
        ],[
            'id.required' => 'ID Wajib diisi',
            'pengelola.required' => 'Wjib Diisi',
            'htm.required' => 'Wajib diisi',
        ]);
        

        $data= [
            'id' =>$request->id,
            'pengelola' =>$request->pengelola,
            'htm' =>$request->htm,
        ];
        Pengelola::create($data);
        return redirect()->to('Pengelola')->with('success', 'Berhasil Menambahkan data');
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
        $data = Pengelola::where('id',$id)->first();
        return view('Pengelola')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pengelola' => 'required',
            'htm' => 'required',
        ],[
            'pengelola.required' => 'Wajib diisi',
            'htm.required' => 'Wajib diisi',
        ]);
        
        $data= [
            'pengelola' =>$request->pengelola,
            'htm' =>$request->htm,
        ];

        Pengelola::where('id',$id)->update($data);
        return redirect()->to('Pengelola')->with('success', 'Berhasil melakukakn Update Data');
    }

    /**
     * Remove the specified resource from storage.
     * * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengelola::where('id', $id)->delete();
        return redirect()->to('Pengelola')->with('success', 'Berhasil melakukan Delete Data');
    }
}
