<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Step extends Model
{
    use HasFactory;

    protected $fillable = ['scenario_id', 'content','is_start',];

    public function scenario()
    {
        return $this->belongsTo(Scenario::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
