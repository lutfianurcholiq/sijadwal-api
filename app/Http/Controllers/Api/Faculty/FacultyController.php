<?php

namespace App\Http\Controllers\Api\Faculty;

use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FacultyResource;
use Illuminate\Support\Facades\Validator;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculty = Faculty::all();
        // return $faculty;

        // cara list data 1
        // return response()->json([
        //     'status' => 'Success',
        //     'data' => $faculty
        // ], 200);

        // cara list data 2, harus tambah new, tidak bisa pakai collection
        return new FacultyResource(true, 'list faculty', $faculty);
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
            return response()->json([
                'status' => 'Fail',
                'error' => $validate->errors()
            ], 422);
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

        return FacultyResource::make('success', 'add data faculty', $create);

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
