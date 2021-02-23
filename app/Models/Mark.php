<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    
    public $table = 'marks';
    protected $fillable = [
        'email','subject_code','subject_name','marks',
    ];
}
