<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absensi.absensi-masuk');
    }

    public function pulang() {
        return view('absensi.absensi-pulang');
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
        $timezome   = 'Asia/Jakarta';
        $date       = new DateTime('now', new DateTimeZone($timezome));
        $tanggal    = $date->format('Y-m-d');
        $localtime  = $date->format('H:i:s');

        $absensi    = Absensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tanggal', '=', $tanggal],
        ])->first();
        if ($absensi) {
            dd("Absensi Sudah Ada");
        } else {
            Absensi::create([
                'user_id'   => auth()->user()->id,
                'tanggal'   => $tanggal,
                'jam_masuk' => $localtime
            ]);
        }

        return redirect('absensiMasuk');
    }

    public function absensiPulang() {
        $timezone   = 'Asia/Jakarta';
        $date       = new DateTime('now', new DateTimeZone($timezone));
        $tanggal    = $date->format('Y-m-d');
        $localtime  = $date->format('H:i:s');

        // mencari user sesuai id dan tanggal
        $absensi    = Absensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tanggal', '=', $tanggal]
        ])->first();
        
        // Data yang akan di update
        $dt         = [
            'jam_pulang'    => $localtime,
            'jam_kerja'     => date('H:i:s', strtotime($localtime)-strtotime($absensi->jam_masuk))
        ];

        if ($absensi->jam_pulang == "") { // Jika jam pulang belum ada / kosong
            $absensi->update($dt);
            return redirect(route('absensiPulang'));
        } else {
            dd("Absensi Pulang Sudah Ada");
        }
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
    public function update(Request $request, $id)
    {
        //
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
