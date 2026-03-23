<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AllDevice extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getConnectionName()
    {
        return Session::get('db_connection', 'mysql'); // Default to 'mysql' if not set
    }

    protected $fillable = [
        'device_id',
        'user_id',
        'model_id',
        'model_type',
        'status',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function device() {
        return $this->belongsTo('App\Models\Device');
    }

    public function model() {
        return $this->morphTo();
    }

}
