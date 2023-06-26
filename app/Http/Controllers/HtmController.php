<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


use App\Models\Pengelola;
use App\Models\Wisata;
use App\Models\Htm;
use App\Models\Kategori;

class HtmController extends Controller
{
    public function index()
    {
        $htm = Htm::orderBy('id', 'desc')->get();
        return  view('wisata.htm')->with('data', $htm);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $htm = Htm::all();
        $pengelola = Pengelola::all();
        $kategori = Kategori::all();
        return view('wisata.htm-add', compact('htm','pengelola', 'kategori'));
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
            'htm' => 'required',
            'kategori' => 'required',
            'pengelola' => 'required',
        ],[
            'id.required' => 'ID Wajib diisi',
            'htm.required' => 'Wajib diisi',
            'kategori.required' => 'Wajib diisi',
            'pengelola.required' => 'Wajib diisi',
        ]);
        

        $data= [
            'id' =>$request->id,
            'htm' =>$request->htm,
            'kategori' =>$request->kategori,
            'pengelola' =>$request->pengelola,
        ];
        Htm::create($data);
        return redirect()->to('Htm')->with('success', 'Berhasil Menambahkan data');
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
        $data = Htm::where('id',$id)->first();
        return view('Htm')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'htm' => 'required',
            'pengelola' => 'required',
            'kategori' => 'required', 
        ],[
            'htm.required' => 'Wajib diisi',
            'pengelola.required' => 'Wajib diisi',
            'kategori.required' => 'Wajib diisi',
        ]);
        
        $data= [
            'htm' =>$request->htm,
            'kategori' =>$request->kategori,
            'pengelola' =>$request->pengelola,
        ];

        Htm::where('id',$id)->update($data);
        return redirect()->to('Htm')->with('success', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     * * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Htm::where('id', $id)->delete();
        return redirect()->to('Htm')->with('success', 'Data Berhasil di Hapus');
    }
}
