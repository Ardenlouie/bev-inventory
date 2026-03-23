<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Device extends Model
{
    use HasFactory;

    public function getConnectionName()
    {
        return Session::get('db_connection', 'mysql'); // Default to 'mysql' if not set
    }


    protected $fillable = [
        'prefix',
        'name',
    ];

    public function laptop() {
        return $this->hasMany('App\Models\Laptop');
    }
}
