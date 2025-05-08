<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'scenario_id' => 'required|exists:scenarios,id',
            'content' => 'required|string',
            'is_start' => 'boolean',
        ];
    }


    // contrainte pour éviter plusieurs étapes is_start=true dans un même scénario
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->boolean('is_start')) {
                $scenarioId = $this->input('scenario_id');

                $query = \App\Models\Step::where('scenario_id', $scenarioId)
                    ->where('is_start', true);

                if ($query->exists()) {
                    $validator->errors()->add('is_start', 'Ce scénario a déjà une étape de départ.');
                }
            }
        });
    }
}
