<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;
    // protected $table = 'courses';

    public function departments() {
        return $this->belongsTo(Department::class);
    }

    public function student() {
        return $this->belongsToMany(Student::class);
    }
}
