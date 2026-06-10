<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShowAll extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'tag_id',
        'device_id',
        'model',
        'serial',
        'employee_id',
        'department_id',
        'date_acquired',
        'age',
        'status',
        'specification',
        'os',
        'office',
        'inclusions',
        'issued_date',
        'note',
        'previous_owner',
        'amount',
        'ds',
        'take_home',

    ];

    public function employee() {
        return $this->belongsTo('App\Models\User');
    }

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function device() {
        return $this->belongsTo('App\Models\Device');
    }

    public function department() {
        return $this->belongsTo('App\Models\Department');
    }

}
