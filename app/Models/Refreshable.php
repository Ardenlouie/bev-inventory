<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Refreshable extends Model
{
    use HasFactory;


    public function department() {
        return $this->belongsTo('App\Models\Department');
    }
}
