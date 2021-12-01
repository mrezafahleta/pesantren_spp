<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function data()
    {
        // $cari = "03";
        // $studentsnim = Student::whereNotExists(function($query) {
        //     $query->select(DB::raw(1))
        //             ->from('users')
        //             ->whereRaw('students.nim = users.nim_murid' );
        // })->where('nim','like', '%' . $cari . '%')->limit(5)->get();
        // dd($studentsnim);
        $users = User::with('student')->get();
        $studentsnim = Student::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('users')
                ->whereRaw('students.nim = users.nim_murid');
        })->get();

        return view('admin.user.data', [
            'users' => $users,
            'students' => $studentsnim
        ]);
    }

    public function loadnimsiswa(Request $request)
    {

        $cari = $request->cari;
        if ($cari == '') {
            $studentsnim = Student::whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereRaw('students.nim = users.nim_murid');
            })->limit(10)->get();
        } else {
            $studentsnim = Student::select('nim', 'nama', 'ttl')->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereRaw('students.nim = users.nim_murid');
            })->where('nim', 'like', '%' . $cari . '%')->limit(5)->get();
        }

        $response = [];

        foreach ($studentsnim as $student) {
            $response[] = [
                "value" => $student->nim,
                "label" => $student->nim .  " (" .  $student->nama . ")",
                "nama" => $student->nama,
                "ttl" => $student->ttl,
            ];
        }
        return response()->json($response);
    }

    public function store(Request $request)
    {

        $validation = [
            'required' => ':attribute tidak boleh kosong',
            'confirmed' => ':attribute konfirmasi tidak sama, harap teliti!'
        ];

     $request->validate([
            'nim_murid' => 'required|unique:users,nim_murid',
            'nama' => 'required',
            'password' => 'required|confirmed',
        ], $validation);
        
        $user = User::create([
            'name' => $request->nama,
            'nim_murid' => $request->nim_murid,
            'email' => $request->nama. "@gmail.com",
            'password' => bcrypt($request->password),
            'status' => 'AKTIF',
            'role_id' => 2
        ]);

        $user->assignRole('User');

        // return redirect()->with('success', "User ".  $request->nama . "  berhasil di assign");
        return redirect()->route('siswa.data')->with('success', $request->nama . ' berhasil ditambahkan ke database');
    }
}
