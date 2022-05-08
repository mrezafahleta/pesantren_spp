<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    public function profil()
    {
       $nik =  Auth::user()->nik_murid;
        $students = Student::where('nik' , $nik)->first();
        return view('user.profil', [
            'profil' => $students
        ]);
    }

    public function update_foto_profil(Request $request) {
        if (request('foto')) {
            Storage::delete($request->foto);
            $extension = request()->file('foto')->getClientOriginalExtension();
            $nama_foto = str_replace(' ', '-', date('dmy ') . $request->nama . '.' . $extension);
            $foto = request()->file('foto')->storeAs('images/siswa', $nama_foto);
        } elseif ($request->foto) {
            $foto = $request->foto;
        } else {
            $foto = null;
        }

        $student = Student::where('nik', $request->nik)->first();
        $student->update([
            'foto' => $foto
        ]);
        return back();
    }

    public function update_profil(Request $request) 
    {
        $validation = [
            'required' => ":attribute tidak boleh kosong"
        ];
        $request->validate([
            'nama' => 'required',
            'ttl' => 'required',
            'jk' => 'required',
            'telp' => "required",
            'alamat' => "required",
            'tanggal_masuk' => "required",
        ],$validation);

        $student = Student::where('nik', $request->nik)->first();

        $student->update([
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            "tanggal_masuk" => date('Y-m-d', strtotime($request->tanggal_masuk))
        ]);

        return back()->with('success', 'Data berhasil diperbarui');


    }
}
