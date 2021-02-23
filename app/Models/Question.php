<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $table = 'questions';
    protected $fillable = [
        'subject_code','question','opt1','opt2','opt3','opt4','ans',
    ];

    /*public function subject()
    {
    	return $this->hasOne(Subject::class,'subject_code','subject_code');
    }*/
}
