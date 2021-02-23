<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $table = 'subjects';
    protected $fillable = [
        'subject_name',
    ];

    public function question(){
    	return $this->hasMany(Question::class,'subject_code');
    }
}
