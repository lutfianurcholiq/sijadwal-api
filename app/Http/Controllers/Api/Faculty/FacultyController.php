<?php

namespace App\Http\Controllers\Api\Faculty;

use App\Http\Controllers\Api\ResponseController;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FacultyResource;
// use App\Http\Controllers\Controller;

class FacultyController extends ResponseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();
        // return $faculty;

        // cara list data 1
        // return response()->json([
        //     'status' => 'Success',
        //     'data' => $faculty
        // ], 200);

        // cara list data 2, harus tambah new, tidak bisa pakai collection
        // return new FacultyResource(true, 'list faculty', $faculty);
            
        // cara list data 3

        return $this->sendResponse(FacultyResource::collection($faculties), 'list faculty', 200);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->all();

        // cara insert data 1
        $validate = Validator::make($input, [
            'faculty_code' => ['required', 'min:2', 'unique:faculties', 'numeric'],
            'faculty_name' => ['required', 'max:255']
        ]);

        // cara insert data 2
        // $validate = validator($request->all([
        //     'faculty_code' => ['required', 'max:2', 'min:1', 'unique:faculties', 'numeric'],
        //     'faculty_name' => ['required', 'max:255']
        // ]));

        // cara insert data 3
        // $validate = $request->validate([
        //     'faculty_code' => ['required', 'max:2', 'min:1', 'unique:faculties', 'numeric'],
        //     'faculty_name' => ['required', 'max:255']
        // ]);

        if ($validate->fails()) {
            // return response()->json([
            //     'status' => 'Fail',
            //     'error' => $validate->errors()
            // ], 422);

            return $this->sendErrorResponse($validate->errors(), 'data fail to added', 422);
        }

        $create = Faculty::create([
            'faculty_code' => $request->faculty_code,
            'faculty_name' => $request->faculty_name
        ]);

        // cara 1 menampilkan data
        // return response()->json([
        //     'response' => [
        //         'status' => 'success',
        //         'message' => 'add data faculty'
        //     ],
        //     'data' => $create
        // ]);

        // cara 2 menampilkan data
        // return FacultyResource::make('success', 'add data faculty', $create);

        // cara 3 menampilkan data
        return $this->sendResponse($create, 'success add data faculty', 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = Faculty::find($id);

        if ($faculty) {
            return $this->sendResponse($faculty, 'detail data faculty', 200);
        }

        return $this->sendErrorResponse($faculty, 'fail detail data faculty', 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $find = Faculty::find($faculty->id);

        if (!$find) {
            
            return $this->sendErrorResponse($find, 'data faculty not found', 425);

        } else {

            $input = $request->all();
    
            // cara insert data 1
            $validate = Validator::make($input, [
                'faculty_code' => ['required', 'min:2', 'unique:faculties', 'numeric'],
                'faculty_name' => ['required', 'max:255']
            ]);
    
            if ($validate->fails()) {
                return $this->sendErrorResponse($validate->errors(), 'data fail to update', 422);
            }
    
            $faculty->update([
                'faculty_code' => $request->faculty_code,
                'faculty_name' => $request->faculty_name
            ]);
    
            return $this->sendResponse($faculty, 'success update data faculty', 200);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();    
        
        return $this->sendResponse([], 'success delete data faculty', 200);
    }
}
