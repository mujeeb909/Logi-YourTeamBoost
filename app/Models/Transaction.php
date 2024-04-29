<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id',
        'user_id',	
        'coach_id',	
        'organization',
        'name',	
        'email'	,
        'amount',  
    ];
}
