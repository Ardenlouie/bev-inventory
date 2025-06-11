<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use HasFactory;
    protected $table = 'furnitures';

    protected $fillable = [
        'company_id',
        'tag_id',
        'furniture_id',
        'item_id',
        'item_name',
        'employee_id',
        'department_id',
        'date_acquired',
        'age',
        'status',
        'specification',
        'issued_date',
        'note',
        'amount',
    ];

    public function employee() {
        return $this->belongsTo('App\Models\User');
    }

    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    public function item() {
        return $this->belongsTo('App\Models\Item');
    }

    public function department() {
        return $this->belongsTo('App\Models\Department');
    }

    // public function scopeLaptopSearch($query, $search, $limit) {
    //     if($search != '') {
    //         $laptops = $query->orderBy('id', 'DESC')
    //         ->where('company_id', 'like', '%'.$search.'%')
    //         ->orWhere('model', 'like', '%'.$search.'%')
    //         ->orWhere('specification', 'like', '%'.$search.'%')
    //         ->orWhere('status', 'like', '%'.$search.'%')
    //         ->paginate($limit)->onEachSide(1)->appends(request()->query());
    //     } else {
    //         $laptops = $query->orderBy('id', 'DESC')
    //         ->paginate($limit)->onEachSide(1)->appends(request()->query());
    //     }

    //     return $laptops;
    // }

}
