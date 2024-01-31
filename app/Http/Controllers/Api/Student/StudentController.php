<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Api\ResponseController;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;

// use App\Http\Controllers\Controller;

class StudentController extends ResponseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return $this->sendResponse(StudentResource::collection($students), 'list data student', 200);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Illuminate\Http\Request
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'faculty_id' => ['required', 'min:1'],
            'major_id' => ['required', 'min:1'],
            'level_id' => ['required', 'min:1'],
            'nim' => ['required', 'max:15', 'min:10', 'numeric', 'unique:students'],
            'name' => ['required', 'max:100'],
            'date_in' => ['required'],
            'birth_place' => ['required', 'max:50'],
            'birth_date' => ['required'],
        ]);

        if ($validate->fails()) 
        {
            return $this->sendErrorResponse($validate->errors(), 'fail add data student', 400);
        }

        $create = Student::create([
            'faculty_id' => $request->faculty_id,
            'major_id' => $request->major_id,
            'level_id' => $request->level_id,
            'nim' => $request->nim,
            'name' => $request->name,
            'date_in' => $request->date_in,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date
        ]);

        return $this->sendResponse($create, 'success add data student', 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $find = Student::find($id);

        if (!$find) {

            return $this->sendErrorResponse($find, 'data student not found', 404);

        } else {
            return $this->sendResponse(new StudentResource($find), 'data student', 200);
        }
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param Illuminate\Http\Request
     * @param App\Models\Student
     */
    public function update(Request $request, Student $student)
    {
        $find = Student::find($student->id);

        if (!$find) {

            return $this->sendErrorResponse($find, 'fail data not found', 404);

        } else {

            $input = $request->all();

            $validate = Validator::make($input, [
                'faculty_id' => ['required', 'min:1'],
                'major_id' => ['required', 'min:1'],
                'level_id' => ['required', 'min:1'],
                'nim' => ['required', 'max:15', 'min:10', 'numeric', 'unique:students'],
                'name' => ['required', 'max:100'],
                'date_in' => ['required'],
                'birth_place' => ['required', 'max:50'],
                'birth_date' => ['required'],
            ]);

            if ($validate->fails()) 
            {
                return $this->sendErrorResponse($validate->errors(), 'fail add data student', 400);
            }

            $student->getUpdatedAtColumn([
                'faculty_id' => $request->faculty_id,
                'major_id' => $request->major_id,
                'level_id' => $request->level_id,
                'nim' => $request->nim,
                'name' => $request->name,
                'date_in' => $request->date_in,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date
            ]);

            return $this->sendResponse($student, 'success update data student', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param App\Models\Student
     */
    public function destroy(Student $student)
    {
        $find = Student::find($student->id);

        if (!$find) {

            return $this->sendErrorResponse($find, 'data not found', 404);
            
        } else {

            $student->delete();

            return $this->sendResponse([], 'success delete data student', 200);
        }
    }
}
