<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Api\ResponseController;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;

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
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
