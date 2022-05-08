<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function getDataUser()
    {
        $user = User::paginate(10);
        return response()->json([
            'user' => $user
        ]);
    }

    public function student(Request $request, Student $student)
    {
        dd($student);
        try {
            $students = Student::where('nim', $request->nim)->first();

            return response()->json([
                'status' => 'Success',
                'code' => '200',
                'student' => $students,
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 'Terjadi kesalahan',
            ]);
        }
    }
}
