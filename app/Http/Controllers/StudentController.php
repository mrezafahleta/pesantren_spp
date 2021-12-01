<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {

        $datasiswa = Student::latest()->get();

        return view('admin.datasiswa.table', [
            'title' => 'Data Siswa Pesantren ABC',
            'students' =>  $datasiswa
        ]);
    }

    public function info(Student $student)
    {
        $spp = Spp::where('nim_murid', $student->nim)->get();
        return view('admin.datasiswa.info', [
            'title' => 'Informasi Siswa',
            'student' => $student,
            'spps' => $spp
        ]);
    }

    public function create()
    {
        $data = Student::orderBy('id', 'desc')->first();

        if ($data < "1") {
            $angka = 1;
        } else {
            $angka = $data['id'] += 1;
        }
        $anggota = date('ymd');
        $kodesiswa = $anggota . sprintf("%06s", $angka);

        return view('admin.datasiswa.tambah_siswa', [
            'title' => 'Tambah Siswa',
            'kode_siswa' => $kodesiswa,

        ]);
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
            'nim' => 'required|unique:students,nim',
            'foto' => "image|mimes:jpeg,jpg,png,svg",
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'telp'   => 'required',
            'jk'    => 'required'
        ], $messages);


        $extension = request()->file('foto')->getClientOriginalExtension();
        $nama_foto = str_replace(' ', '-', date('dmy ') . $request->nama . '.' . $extension);
        $foto = request()->file('foto')->storeAs('images/siswa', $nama_foto);

        Student::create([
            "nim" => $request->nim,
            "nama" => $request->nama,
            "foto" => $foto,
            "ttl" => $request->ttl,
            "alamat" => $request->alamat,
            "jk" => $request->jk,
            "telp" => $request->telp,
        ]);

        return redirect()->route('siswa.data')->with('success', $request->nama . ' berhasil ditambahkan ke database');
    }

    public function edit(Student $student)
    {
        return view('admin.datasiswa.edit', [
            'title' => 'Edit Siswa ' . $student->name,
            'student' => $student
        ]);
    }

    public function update(Student $student, Request $request)
    {
        if (request('foto')) {
            Storage::delete($student->foto);
            $extension = request()->file('foto')->getClientOriginalExtension();
            $nama_foto = str_replace(' ', '-', date('dmy ') . $request->nama . '.' . $extension);
            $foto = request()->file('foto')->storeAs('images/siswa', $nama_foto);
        } elseif ($student->foto) {
            $foto = $student->foto;
        } else {
            $foto = null;
        }

        $student->update([
            "nim" => $request->nim,
            "nama" => $request->nama,
            "foto" => $foto,
            "ttl" => $request->ttl,
            "alamat" => $request->alamat,
            "jk" => $request->jk,
            "telp" => $request->telp,
          
        ]);
        return redirect()->route('siswa.data')->with('success', 'Data ' . $request->nama . ' berhasil diUbah');
    }


    public function destroy($id)
    {

        $student = Student::where('nim', $id)->first();

        Storage::delete($student->foto);
        $student->delete();
        return redirect()->route('siswa.data')->with('successhapus', 'Data berhasil dihapus!');
    }
}
