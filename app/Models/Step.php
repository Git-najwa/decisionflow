<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Step extends Model
{
    use HasFactory;

    protected $fillable = ['scenario_id', 'content'];

    public function scenario()
    {
        return $this->belongsTo(Scenario::class);
    }
}
