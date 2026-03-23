<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
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
