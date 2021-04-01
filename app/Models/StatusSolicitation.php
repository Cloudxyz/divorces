<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusSolicitation extends Model
{
    use HasFactory;

    protected $table = 'status_solicitations';
    protected $fillable = [
        'name',
    ];
}
