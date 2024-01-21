<?php

namespace App\Http\Controllers\Api\Major;

use App\Http\Controllers\Api\ResponseController;
use App\Http\Resources\MajorResource;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use App\Http\Controllers\Controller;

class MajorController extends ResponseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::all();

        return $this->sendResponse(MajorResource::collection($majors), 'list data majors', 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'faculty_id' => ['required', 'min:1', 'numeric'],
            'major_code' => ['required', 'min:1', 'numeric', 'unique:majors'],
            'major_name' => ['required', 'max:100']
        ]);

        if ($validate->fails()) 
        {
            return $this->sendErrorResponse($validate, 'fail data add to majors', 425);
        }

        $create = Major::create([
            'faculty_id' => $request->faculty_id,
            'major_code' => $request->major_code,
            'major_name' => $request->major_name
        ]);

        return $this->sendResponse($create, 'success add data to majors', 201);

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
    public function update(Request $request, Major $major)
    {
        $find = Major::find($major->id);

        if (!$find) 
        {
            return $this->sendErrorResponse([], 'data major not found', 400);
            
        } 

        $input = $request->all();

        $validate = Validator::make($input, [
            'faculty_id' => ['required', 'min:1', 'numeric'],
            'major_code' => ['required', 'min:1', 'numeric', 'unique:majors'],
            'major_name' => ['required', 'max:100']
        ]);

        if ($validate->fails()) 
        {
            return $this->sendErrorResponse($validate->errors(), 'fail update data majors', 400);
        }

        $major->update([
            'faculty_id' => $request->faculty_id,
            'major_code' => $request->major_code,
            'major_name' => $request->major_name
        ]);

        return $this->sendResponse($major, 'success update data to majors', 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $find = Major::find($major->id);

        if (!$find) 
        {
            return $this->sendErrorResponse($find, 'data not found', 404);
        }

        $major->delete();

        return $this->sendResponse([], 'success delete data majors', 200);
    }
}
