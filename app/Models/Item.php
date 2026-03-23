<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Item extends Model
{
    use HasFactory;

    public function getConnectionName()
    {
        return Session::get('db_connection', 'mysql'); // Default to 'mysql' if not set
    }


    protected $fillable = [
        'name',
    ];

    public function furniture() {
        return $this->hasMany('App\Models\Furniture');
    }
}
