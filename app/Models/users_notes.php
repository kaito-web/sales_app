<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_notes extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_id',
        'note',
    ];

    public $timestamps = true;
}
