<?php

namespace App\Http\Controllers\Api\Level;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LevelResource;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Support\Facades\Validator;

class LevelController extends ResponseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();

        return $this->sendResponse(LevelResource::collection($levels), 'list data level', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'level_code' => ['required', 'min:1', 'unique:levels'],
            'level_name' => ['required', 'max:100']
        ]);

        if ($validate->fails()) {
            return $this->sendErrorResponse($validate->errors(), 'data fail to added', 400);
        }

        $create = Level::create([
            'level_code' => $request->level_code,
            'level_name' => $request->level_name
        ]);

        return $this->sendResponse($create, 'success add data level', 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $find = Level::find($id);

        if (!$find) {

            return $this->sendErrorResponse($find, 'data level not found', 404);

        } else {

            return $this->sendResponse($find, 'detail data level', 200);
            
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $find = Level::find($level->id);

        if (!$find) 
        {
            return $this->sendErrorResponse($find, 'data not found', 404);

        } else {

            $input = $request->all();

            $validate = Validator::make($input, [
                'level_code' => ['required', 'min:1', 'unique:levels'],
                'level_name' => ['required', 'max:100']
            ]);
    
            if ($validate->fails()) {
                return $this->sendErrorResponse($validate->errors(), 'data fail to added', 400);
            }
    
            $level->update([
                'level_code' => $request->level_code,
                'level_name' => $request->level_name
            ]);
    
            return $this->sendResponse($level, 'success update data level', 200);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $find = Level::find($level->id);

        if (!$find) 
        {
            return $this->sendErrorResponse($find, 'data not found', 404);
        } else {
            $level->delete();

            return $this->sendResponse([], 'success data delete', 200);
        }
    }
}
