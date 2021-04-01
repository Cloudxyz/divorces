<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'firstname',
        'lastname',
        'country',
        'state',
        'city',
        'street',
        'zip',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // mutator: full_name 
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
