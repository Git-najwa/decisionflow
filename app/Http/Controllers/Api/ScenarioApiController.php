<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Scenario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScenarioRequest;


class ScenarioApiController extends Controller
{
    // GET /api/scenarios
    public function index()
    {
        return response()->json(Scenario::all());
    }

    // POST /api/scenarios
    public function store(StoreScenarioRequest $request)
    {
        $scenario = Scenario::create($request->validated());
        return response()->json($scenario, 201);
    }


    // GET /api/scenarios/{id}
    public function show($id)
    {
        return response()->json(Scenario::findOrFail($id));
    }

    // PUT /api/scenarios/{id}
    public function update(StoreScenarioRequest $request, $id)
    {
        $scenario = Scenario::findOrFail($id);
        $scenario->update($request->validated());
        return response()->json($scenario);
    }


    // DELETE /api/scenarios/{id}
    public function destroy($id)
    {
        Scenario::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
