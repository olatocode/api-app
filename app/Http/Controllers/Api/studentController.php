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
        // methods: create(), all(), find(), update(), delete()
        $validateData = $request->validate([
            'firstName'=> 'required|string|max:255',
            'lastName'=> 'required|string|max:255',
            'location'=> 'required|string|max:255',
            'phoneNumber'=> 'required|string|min:11|max:11',
        ]);

        $student = Student::create($validateData);
        
        if ($student) {
            return response()->json([
                'message' => 'Student created successfully',
                'data' => $student
            ], 201);
        } else {
             return response()->json([
                'message' => 'Something went wrong',
            ], 500);
        }
        
    }

    public function getAllStudents() {
        $students = Student::all();

        if ($students->count() > 0) {
            return response()->json([
                'message' => 'Students retrieved successfully',
                'data' => $students
            ], 200);
    } else {
        return response()->json([
            'message' => 'Student not found',
        ], 404);
    }
    }

    public function getAStudent($id)
    {
       $student = Student::find($id);
        if ($student) {
            return response()->json([
                'message' => 'Student retrieved successfully',
                'data' => $student
            ], 200);
    } else {
        return response()->json([
            'message' => 'Student not found',
        ], 404);
    }
    }

    public function updateAStudent(Request $request, $id)
    {
     $student = Student::find($id);
      $student->update($request->all());

       if ($student) {
            return response()->json([
                'message' => 'Student updated successfully',
                'data' => $student
            ], 200);
    } else {
        return response()->json([
            'message' => 'Student not found',
        ], 404);
    }

    }

     public function deleteAStudent($id)
    {
     $student = Student::find($id);
      $student->delete();

       if ($student) {
            return response()->json([
                'message' => 'Student deleted successfully',
                'data' => $student
            ], 200);
    } else {
        return response()->json([
            'message' => 'Student not found',
        ], 404);
    }

    }


}
