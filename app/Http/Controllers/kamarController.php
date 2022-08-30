<?php

namespace App\Http\Controllers;

use App\Models\jeniskamar;
use Illuminate\Http\Request;
use App\Models\kamar;

class kamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $kamar = kamar::all();
        return view('admin.kamar.listKamar', compact('kamar'));
    }

    public function form()
    {
        $jeniskamar = jeniskamar::all();
        return view('admin.kamar.tambahKamar', compact('jeniskamar'));
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
            'jeniskamar' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);


        $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('images/kamar'), $imageName);

        kamar::create([
            'id_jeniskamar' => $request->jeniskamar,
            'deskripsi' => $request->deskripsi,
            'stock' => $request->stock,
            'harga' => $request->harga,
            'gambar' => $imageName,
        ]);
        return redirect('admin/kamar');
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
    public function detail(kamar $kamar)
    {
        $jeniskamar = jeniskamar::all();
        return view('admin.kamar.editKamar', compact('kamar'), compact('jeniskamar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required',
            'jeniskamar' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $imageName = $request->gambarLama;

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $image->move(public_path('images/kamar'), $imageName);
        }

        kamar::where('id', $id)->update([
            'stock' => $request->stock,
            'id_jeniskamar' => $request->jeniskamar,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $imageName,
        ]);
        return redirect('admin/kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kamar)
    {
        kamar::where('id', $kamar)->delete();

        return redirect()->back();
    }
}
