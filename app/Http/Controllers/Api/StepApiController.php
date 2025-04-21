<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStepRequest;
use App\Models\Step;

class StepApiController extends Controller
{
    // GET /api/steps
    public function index()
    {
        return response()->json(Step::all());
    }

    // POST /api/steps
    public function store(StoreStepRequest $request)
    {
        $step = Step::create($request->validated());
        return response()->json($step, 201);
    }

    // GET /api/steps/{id}
    public function show($id)
    {
        return response()->json(Step::findOrFail($id));
    }

    // PUT /api/steps/{id}
    public function update(StoreStepRequest $request, $id)
    {
        $step = Step::findOrFail($id);
        $step->update($request->validated());
        return response()->json($step);
    }

    // DELETE /api/steps/{id}
    public function destroy($id)
    {
        Step::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
