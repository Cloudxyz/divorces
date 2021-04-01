<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDivorce extends Model
{
    use HasFactory;

    protected $table = 'types_divorce';
    protected $fillable = [
        'name',
    ];
}
