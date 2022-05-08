<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Student;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $data = Spp::with('student')->latest()->get();

        return view('admin.spp.pembayaran', [
            'title' => 'Pembayaran SPP',
            'spps' => $data
        ]);
    }

    public function pencarian_nis(Student $student, Request $request)
    {

        $data = Student::with('spps')->where('nik', $request->pencarian)->first();
        $total_pembayaran = Spp::where('nik_murid', $request->pencarian)->sum('jumlah');
        $telah_bayar = Spp::where('nik_murid', $request->pencarian)->count('pembayaran_ke');

        if (!$data) {
            return redirect()->route('pembayaran.spp')->with('notfound', 'Data tidak ditemukan!!!');
        } else {

            return view('admin.spp.detail_pembayaran', [
                'title' => 'Detail Pembayaran Siswa',
                'data'  => $data,
                'total_pembayaran' => $total_pembayaran,
                'telah_bayar' => $telah_bayar
            ]);
        }
    }

    public function loadDataSiswa(Request $request)
    {

        $search = $request->search;
        if ($search == '') {
            $students = Student::orderby('id', 'asc')->select('nik', 'nama')->limit(5)->get();
        } else {
            $students = Student::orderby('id', 'asc')->select('nik', 'nama')->where('nik', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($students as $student) {
            $response[] = array("value" => $student->nik, "label" => $student->nama);
        }

        return response()->json($response);
    }

    public function store(Request $request)
    {
       
        $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong! ',
        ];
        $request->validate([
            'nik_murid' => 'required',
            'jumlah' => 'required',
            'pembayaran_ke' => 'required',
            'status' => "required",
            'tanggal_bayar' => 'required',
        ], $messages);

        $nomor = Spp::latest()->first();
      
        Spp::create([
            'nomor_pembayaran' =>  "spb". $nomor['nomor_pembayaran'] + 1,
            'nik_murid' => $request->nik_murid,
            'pembayaran_ke' => $request->pembayaran_ke,
            'jumlah' => $request->jumlah,
            'tanggal_bayar' => $request->tanggal_bayar,
            'status' => $request->status
        ]);

        return redirect()->route('pembayaran.spp')->with('success',  ' Pembayaran berhasil disimpan kedatabase');
    }

}
