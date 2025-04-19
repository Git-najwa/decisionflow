<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Scenario;
use Illuminate\Http\Request;

class ScenarioApiController extends Controller
{
    // GET /api/scenarios
    public function index()
    {
        return response()->json(Scenario::all());
    }

    // POST /api/scenarios
    public function store(Request $request)
    {
        $scenario = Scenario::create($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return response()->json($scenario, 201);
    }

    // GET /api/scenarios/{id}
    public function show($id)
    {
        return response()->json(Scenario::findOrFail($id));
    }

    // PUT /api/scenarios/{id}
    public function update(Request $request, $id)
    {
        $scenario = Scenario::findOrFail($id);
        $scenario->update($request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return response()->json($scenario);
    }

    // DELETE /api/scenarios/{id}
    public function destroy($id)
    {
        Scenario::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
