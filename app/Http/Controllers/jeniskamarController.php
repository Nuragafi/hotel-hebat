<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jeniskamar;

class jeniskamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeniskamar = jeniskamar::all();
        return view('admin.jenisKamar.listJenis', compact('jeniskamar'));
    }

    public function form()
    {
        return view('admin.jenisKamar.tambahJenis');
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
        ]);

        jeniskamar::create([
            'jeniskamar' => $request->jeniskamar
        ]);

        return redirect('admin/jenis');
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
    public function detail(jeniskamar $jeniskamar)
    {
        return view('admin.jenisKamar.editJenis', compact('jeniskamar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jeniskamar' => 'required',
        ]);

        jeniskamar::where('id', $id)->update([
            'jeniskamar' => $request->jeniskamar
        ]);

        return redirect('admin/jenis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        jeniskamar::where('id', $id)->delete();
        return redirect()->back();
    }
}
