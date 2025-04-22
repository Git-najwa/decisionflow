<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['step_id', 'text', 'next_step_id'];

    // L'option appartient à une étape (celle qui l'affiche)
    public function step()
    {
        return $this->belongsTo(Step::class);
    }

    // Relation à soi-même : l’étape vers laquelle mène ce choix
    public function nextStep()
    {
        return $this->belongsTo(Step::class, 'next_step_id');
    }
}
