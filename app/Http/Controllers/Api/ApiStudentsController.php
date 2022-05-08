<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class ApiStudentsController extends Controller
{
    public function getDataStudents()
    {
        $students = Student::paginate(5);

        return response()->json([
            'status' => 'Success',
            'students' => $students
        ], 200);
    }

    public function detailStudent(Request $request)
    {
        $student = Student::where('nim', $request->nim)->first();

        if (!$student) {
            return  response()->json([
                'code' => "404",
                'status' => "Data tidak tersedia",
            ], 404);
        } else {
            return     response()->json([
                'code' => "200",
                'status' => "Success",
                'student' => $student,
            ], 200);
        }
    }

    public function student(Student $student)
    {

        try {
            if ($student == "") {
                return  response()->json([
                    'code' => "404",
                    'status' => "Data tidak tersedia",
                    'students' => null
                ]);
            } else {
                return     response()->json([
                    'code' => "200",
                    'status' => "Success",
                    'student' => $student,
                ]);
            }
        } catch (Exception $error) {
            return   response()->json([
                'code' => "500",
                'status' => "Error",
                'error' => $error,
            ]);
        }
    }
}
