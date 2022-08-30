<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasilitas;
use App\Models\kamar;

class fasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fasilitas = fasilitas::all();
        return view('admin.fasilitas.listFasilitas', compact('fasilitas'));
    }


    public function form()
    {
        return view('admin.fasilitas.tambahFasilitas');
    }

    public function card()
    {
        $kamar = kamar::all();
        $fasilitas = fasilitas::all();
        return view('home', compact('fasilitas'), compact('kamar'));
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
        $request->validate([
            'fasilitas' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);


        $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('images/fasilitas'), $imageName);

        fasilitas::create([
            'fasilitas' => $request->fasilitas,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName
        ]);
        return redirect('admin/fasilitas');
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
    public function detail(fasilitas $fasilitas)
    {
        return view('admin.fasilitas.editFasilitas', compact('fasilitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fasilitas' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $imageName = $request->gambarLama;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $image->move(public_path('images/fasilitas'), $imageName);
        }

        fasilitas::where('id', $id)->update([
            'fasilitas' => $request->fasilitas,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        return redirect('admin/fasilitas')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fasilitas)
    {
        fasilitas::where('id', '=', $fasilitas)->delete();

        return redirect()->back();
    }
}
