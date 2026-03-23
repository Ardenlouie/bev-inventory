<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;


class Laptop extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getConnectionName()
    {
        return Session::get('db_connection', 'mysql'); // Default to 'mysql' if not set
    }

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

    public function scopeLaptopSearch($query, $search, $limit) {
        if($search != '') {
            $laptops = $query->orderBy('id', 'DESC')
            ->where('company_id', 'like', '%'.$search.'%')
            ->orWhere('model', 'like', '%'.$search.'%')
            ->orWhere('specification', 'like', '%'.$search.'%')
            ->orWhere('status', 'like', '%'.$search.'%')
            ->paginate($limit)->onEachSide(1)->appends(request()->query());
        } else {
            $laptops = $query->orderBy('id', 'DESC')
            ->paginate($limit)->onEachSide(1)->appends(request()->query());
        }

        return $laptops;
    }

}
