<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Scenario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScenarioRequest;
use Illuminate\Support\Facades\Auth;


class ScenarioApiController extends Controller
{
    // GET /api/scenarios
    public function index()
    {
        // return response()->json(Scenario::all());
        return response()->json(
            Scenario::with('steps.options')->get()
        );
    }

    // POST /api/scenarios
    public function store(StoreScenarioRequest $request)
    {

        /** @var \App\Models\User $user */
        $user = Auth::user();


        if (!$user) {
            return response()->json(['message' => 'Utilisateur non authentifié'], 401);
        }

        $scenario = $user->scenarios()->create($request->validated());

        return response()->json($scenario, 201);
    }


    // GET /api/scenarios/{id}
    public function show($id)
    {
        $scenario = Scenario::with('steps')->findOrFail($id);
        return response()->json($scenario);
    }

    // PUT /api/scenarios/{id}
    public function update(StoreScenarioRequest $request, $id)
    {
        $scenario = Scenario::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$scenario) {
            return response()->json(['message' => 'Scénario introuvable ou non autorisé'], 404);
        }

        $scenario->update($request->validated());

        return response()->json($scenario);
    }


    // DELETE /api/scenarios/{id}
    public function destroy(Request $request, $id)
    {
        $scenario = Scenario::findOrFail($id);

        if ($scenario->user_id !== $request->user()->id) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $scenario->delete();

        return response()->json(null, 204);
    }
}
