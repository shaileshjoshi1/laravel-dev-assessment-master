<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    protected $table = 'skills';

    //




    protected $fillable = [
        'name', 
       

    ];



    public function jobs() {
        return $this->belongsToMany(Job::class, 'job_skills'); // Or withPivot
    }
}
