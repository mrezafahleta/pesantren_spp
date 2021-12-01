<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Student;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{


    public function viewCetak(Spp $spp)
    {
        return view('cetak.laporan_spp',[
            'spp' => $spp
        ]);
    }

    public function cetakspp(Spp $spp)
    {
    
        $pdf = PDF::loadview('cetak.laporan_spp_pdf',[
            'spp' => $spp
        ])->setPaper('A4','potrait');
        return $pdf->stream();
    }


    public function laporan()
    {
        return view('admin.spp.laporan_spp', [
            'title' => 'Laporan SPP',

        ]);
    }

    public function cari_laporan(Request $request)
    {
        $dari = $request->from;
        $sampai = $request->to;

        $spp = Spp::with('student')->whereBetween('tanggal_bayar', [$dari, $sampai])
            ->get();

        $pdf = PDF::loadview('admin.spp.detail_pencarian_laporan', [
            'spp' => $spp,
            'dari' => $dari,
            'sampai' => $sampai
        ])->setPaper('A4', 'potrait');

        return $pdf->stream();
        // return view('admin.spp.detail_pencarian_laporan', [
        //     'title' => 'detail laporan',
        //     'spp' => $spp,
        //     'dari' => $dari,
        //     'sampai' => $sampai,
        // ]);
    }

    public function loadDataSiswa(Request $request)
    {

        $search = $request->search;

        $students = Student::orderby('id', 'asc')->select('nim', 'nama')->where('nim', 'like', '%' . $search . '%')->limit(5)->get();


        $response = array();
        foreach ($students as $student) {
            $response[] = array("value" => $student->nim, "label" => $student->nama);
        }

        return response()->json($response);
    }

    public function cari_laporan_nim(Request $request)
    {


        $spp = Spp::with('student')->where('nim_murid', $request->pencarian)
            ->get();

        $total = Spp::where('nim_murid', $request->pencarian)->sum('jumlah');
        $pdf = PDF::loadview('admin.spp.laporan_spp_nim', [
            'spp' => $spp,
            'total' => $total

        ])->setPaper('A4', 'potrait');

        return $pdf->stream();
        // return view('admin.spp.detail_pencarian_laporan', [
        //     'title' => 'detail laporan',
        //     'spp' => $spp,
        //     'dari' => $dari,
        //     'sampai' => $sampai,
        // ]);
    }
}
