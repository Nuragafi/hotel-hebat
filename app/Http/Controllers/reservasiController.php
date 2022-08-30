<?php

namespace App\Http\Controllers;

use App\Models\jeniskamar;
use Illuminate\Http\Request;
use App\Models\kamar;
use App\Models\client;
use App\Models\reservasi;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class reservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = client::all();
        $reservasi = reservasi::all();
        return view('resepsionis.dashboard', compact('reservasi'));
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
    public function store(Request $request, $id)
    {
        $kamar = kamar::find($id);

        $tanggalAwal = Carbon::parse($request->mulai);
        $tanggalAkhir = Carbon::parse($request->selesai);

        $jumlahHari = $tanggalAwal->diffInDays($tanggalAkhir);

        $hargaTotal = $kamar->harga * $jumlahHari * $request->jumlahKamar;

        $updateStock = $kamar->stock - $request->jumlahKamar;

        DB::beginTransaction();
        try {
            $idClient = client::insertGetId([
                'nama' => $request->nama,
                'email' => $request->email,
                'telpon' => $request->telpon
            ]);

            $reservasi = reservasi::insertGetId([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'total' => $hargaTotal,
                'jumlahKamar' => $request->jumlahKamar,
                'status' => 'Dalam Proses',
                'id_client' => $idClient,
                'id_kamar' => $id
            ]);

            kamar::where('id', $id)->update([
                'stock' => $updateStock
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal melakukan reservasi');
        }
        return redirect('reservasi/kwitansi/' . $reservasi)->with('success', 'Reservasi berhasil dilakukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kamar = kamar::find($id);
        return view('reservasi', compact('kamar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservasi = reservasi::find($id);
        return view('resepsionis.proses', compact('reservasi'));
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
        $request->validate([
            'status' => 'required',
        ]);

        reservasi::where('id', $id)->update([
            'status' => $request->status
        ]);

        if ($request->status == 'Checkout') {
            $reservasi = reservasi::find($id);
            $kamar = kamar::find($reservasi->id_kamar);
            $updateStock = $kamar->stock + $reservasi->jumlahKamar;
            kamar::where('id', $reservasi->id_kamar)->update([
                'stock' => $updateStock
            ]);
        }

        if ($request->status == 'Dibatalkan') {
            $reservasi = reservasi::find($id);
            $kamar = kamar::find($reservasi->id_kamar);
            $updateStock = $kamar->stock + $reservasi->jumlahKamar;
            kamar::where('id', $reservasi->id_kamar)->update([
                'stock' => $updateStock
            ]);
        }
        return redirect('resepsionis');
    }

    public function kwitansi($id)
    {
        $reservasi = reservasi::find($id);
        return view('kwitansi', compact('reservasi'));
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
