<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pendaftaran()
    {
        return view('pendaftaran');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong! ',
            'string'    => 'The :attribute must be text format',
            'file'    => 'The :attribute must be a file',
            'mimes' => 'File foto hanya mendukung :attribute are :mimes',
            'max'      => 'The :attribute must have a maximum length of :max',
            'image' => ':attribute harus berupa gambar'
        ];
        $request->validate([
            'nik' => 'required|unique:students,nik',
            'foto' => "image|mimes:jpeg,jpg,png,svg",
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'telp'   => 'required',
            'jk'    => 'required'
        ], $messages);


        // $extension = request()->file('foto')->getClientOriginalExtension();
        // $nama_foto = str_replace(' ', '-', date('dmy ') . $request->nama . '.' . $extension);
        // $foto = request()->file('foto')->storeAs('images/siswa', $nama_foto);

        Student::create([
            "nik" => $request->nik,
            "nama" => $request->nama,
            // "foto" => $foto,
            "ttl" => $request->ttl,
            "alamat" => $request->alamat,
            "jk" => $request->jk,
            "telp" => $request->telp,
        ]);

        return redirect()->route('pendaftaran')->with('success', $request->nama . 'Anda telah berhasil mendaftarkan data anda');
    }
}
