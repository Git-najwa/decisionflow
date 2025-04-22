<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOptionRequest;
use App\Models\Option;

class OptionApiController extends Controller
{
    // GET /api/options
    public function index()
    {
        return response()->json(Option::all());
    }

    // POST /api/options
    public function store(StoreOptionRequest $request)
    {
        $option = Option::create($request->validated());
        return response()->json($option, 201);
    }

    // GET /api/options/{id}
    public function show($id)
    {
        return response()->json(Option::findOrFail($id));
    }

    // PUT /api/options/{id}
    public function update(StoreOptionRequest $request, $id)
    {
        $option = Option::findOrFail($id);
        $option->update($request->validated());
        return response()->json($option);
    }

    // DELETE /api/options/{id}
    public function destroy($id)
    {
        Option::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
