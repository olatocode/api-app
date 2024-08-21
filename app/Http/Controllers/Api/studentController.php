<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class studentController extends Controller
{
    //
    public function createStudent(Request $request)
    {   
        // methods: create(), all(), findOrFall(), update(), delete()

        $student = Student::create($request->all());

        if ($student) {
            return response()->json([
                'message' => 'Student created successfully',
                'data' => $student
            ], 201);
        } else {
             return response()->json([
                'message' => 'Something went wrong',
                'data' => 'error'
            ], 500);
        }
        
    }

    public function getAllStudents() {
        $students = Student::all();

        if ($students) {
            return response()->json([
                'message' => 'Students retrieved successfully',
                'data' => $students
            ], 200);
    } else {
        return response()->json([
            'message' => 'Something went wrong',
            'data' => 'error'
        ], 500);
    }
    }

}
